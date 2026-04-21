#!/usr/bin/env bash

set -euo pipefail

SERVER_DIR="/home/peter/phorge-neu/phorge"
ARCANIST_DIR="/home/peter/phorge-neu/arcanist"
START_AT=""
USE_FORCE=0

STAGES=(
  "2015-12-31|fe6224f5059e269db130dcb2f22ded402f795e08|3dbc1418ff07de30cbd22193efad0efd5fc2d7f2"
  "2016-12-31|69194fdaf51085249bcf3509469a25ec1e254ae9|e8b580d2e5e740071b25d087a0aca33f0b0dd691"
  "2017-12-31|65fa04754a94a0f93673ed391c1808dd888d2012|08674ca997b62b695f773c32f0c20e51128bc053"
  "2018-12-31|a3acd3450d7f93629f4cd0b6b4bf9b79e4213e95|97ddb9d5a1be282d6002a875a759266bb97b653f"
  "2019-12-31|c4b4a53cad7722f031b725f8b41511e9d341d033|bac2028421a4be6e34e08764bbbda49e68b3a604"
  "2021-02-15|9feb7343e662c12e794960905cf3f734cb59c251|faca82a3d55c83d0bb87c61d654f7a2f1f9682a6"
  "2022-06-30|9426765a2c6a149f5b0ed2d9132cd1e4e7ee152d|85c953ebe4a6fef332158fd757d97c5a58682d3a"
  "2022-08-31|377ac059d6dac4c6f443d95d7c375b2e443cbfe6|0c0b9644a6a86e338ff3e3ea9cfc3021c2d96785"
  "2023-12-31|428f9686c4171912ee186ebd919640a7427da768|6142fcd5264ff605321657e75aae2701e3dd2108"
  "2024-12-31|ed6644f31757fa88ba0fa524fbcfb991535eb42f|abda70208340f4869a9b725658bf38e64ccd4e0a"
  "local-target|1ef1331f422841bee60a8b6c8b31ee0b4475a89a|29e20620fcc18c65fd1b280e92dbeaf8431c661d"
)

usage() {
  cat <<EOF
Usage: $(basename "$0") [options]

Checks out curated staged commits in one server working copy and one
Arcanist working copy, then runs "bin/storage upgrade" at each stage.
The script aborts immediately on the first failed checkout or upgrade.

Options:
  --server-dir PATH        Path to the server working copy.
  --arcanist-dir PATH      Path to the Arcanist working copy.
  --start-at LABEL         Start at a stage label like "2018-12-31".
  --force                  Pass --force to bin/storage upgrade.
  --list                   Print configured stages and exit.
  -h, --help               Show this help.
EOF
}

list_stages() {
  local stage label server client
  for stage in "${STAGES[@]}"; do
    IFS="|" read -r label server client <<<"$stage"
    printf '%s\n' "$label"
    printf '  server     %s\n' "$server"
    printf '  arcanist   %s\n' "$client"
  done
}

while [[ $# -gt 0 ]]; do
  case "$1" in
    --server-dir)
      SERVER_DIR="$2"
      shift 2
      ;;
    --arcanist-dir)
      ARCANIST_DIR="$2"
      shift 2
      ;;
    --start-at)
      START_AT="$2"
      shift 2
      ;;
    --force)
      USE_FORCE=1
      shift
      ;;
    --list)
      list_stages
      exit 0
      ;;
    -h|--help)
      usage
      exit 0
      ;;
    *)
      printf 'Unknown argument: %s\n' "$1" >&2
      usage >&2
      exit 1
      ;;
  esac
done

require_clean_repo() {
  local repo="$1"

  if [[ ! -d "$repo/.git" ]]; then
    printf 'Not a git working copy: %s\n' "$repo" >&2
    exit 1
  fi

  if [[ -n "$(git -C "$repo" status --porcelain)" ]]; then
    printf 'Working copy is not clean: %s\n' "$repo" >&2
    exit 1
  fi
}

require_clean_repo "$SERVER_DIR"
require_clean_repo "$ARCANIST_DIR"

fetch_origin_history() {
  local repo="$1"

  if git -C "$repo" ls-remote --exit-code --heads origin stable >/dev/null 2>&1; then
    git -C "$repo" fetch origin master stable
  else
    git -C "$repo" fetch origin master
  fi
}

fetch_origin_history "$SERVER_DIR"
fetch_origin_history "$ARCANIST_DIR"

require_commit() {
  local repo="$1"
  local commit="$2"
  local label="$3"

  if ! git -C "$repo" cat-file -e "${commit}^{commit}" 2>/dev/null; then
    printf 'Required commit for stage %s is not available in %s: %s\n' \
      "$label" "$repo" "$commit" >&2
    printf 'The clone likely does not have the needed origin history.\n' >&2
    printf 'Make sure the fork exposes the required branch history and rerun the script.\n' >&2
    exit 1
  fi
}

upgrade_args=()
if [[ $USE_FORCE -eq 1 ]]; then
  upgrade_args+=(--force)
fi

seen_start=0
if [[ -z "$START_AT" ]]; then
  seen_start=1
fi

for stage in "${STAGES[@]}"; do
  IFS="|" read -r label server_commit client_commit <<<"$stage"

  if [[ $seen_start -eq 0 ]]; then
    if [[ "$label" != "$START_AT" ]]; then
      continue
    fi
    seen_start=1
  fi

  printf '\n== Stage %s ==\n' "$label"
  require_commit "$ARCANIST_DIR" "$client_commit" "$label"
  require_commit "$SERVER_DIR" "$server_commit" "$label"

  printf 'Checking out arcanist %s\n' "$client_commit"
  git -C "$ARCANIST_DIR" checkout "$client_commit"

  printf 'Checking out server %s\n' "$server_commit"
  git -C "$SERVER_DIR" checkout "$server_commit"

  printf 'Running storage upgrade at %s\n' "$label"
  (
    cd "$SERVER_DIR"
    ./bin/storage upgrade "${upgrade_args[@]}"
  )

  printf 'Stage %s completed successfully.\n' "$label"
done

if [[ $seen_start -eq 0 ]]; then
  printf 'Unknown --start-at label: %s\n' "$START_AT" >&2
  exit 1
fi

printf '\nAll staged upgrades completed successfully.\n'
