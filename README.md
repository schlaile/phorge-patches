# phorge-patches

Curated working repository for local Phorge and Arcanist changes.

This repository does not contain full upstream trees. It only contains:

- patch series against `phorge` and `phorge-arcanist`
- migration helpers for historic `phabricator` and `libphutil` changes
- translation data and import/build notes
- branding overlays
- technical inventories and upstream candidates

## Active Working Trees

For current work, the authoritative repositories are:

- `phorge`: active server/core tree
- `phorge-arcanist`: active Arcanist tree, including functionality that used
  to live in standalone `libphutil`

Reference-only trees:

- old `phabricator`
- standalone `libphutil`

These older trees may still be useful for archaeology, but fixes intended for
current upstreaming should be checked against `phorge` or `phorge-arcanist`
before they are curated as candidate patches here.

## Goal

Maintain local changes in a way that keeps them:

- small and maintainable
- upstream-friendly where practical
- separate from deployment and internal operations knowledge

## Structure

- `patches/phorge/`: curated patches against `phorge`
- `patches/arcanist/`: curated patches against `phorge-arcanist`
- `patches/libphutil/`: legacy or reference patches against standalone
  `libphutil`; do not assume these map directly to current upstream targets
- `patches/libphutil-legacy/`: historic patches from the old `libphutil`
- `translation/de/`: German translation data
- `translation/FORMAT.md`: repository-wide translation format reference,
  including the local `I18N-ARRAY` PO extension
- `translation/import/`: notes and helpers for import/build paths
- `translation/wikimedia/`: evaluation of the Wikimedia import path
- `branding/phabricator/`: internal branding overlay for keeping visible "Phabricator" naming
- `branding/assets/`: non-sensitive branding artifacts
- `notes/`: inventories, upgrade plan, upstream candidates
- `scripts/`: helper scripts for export, apply, and build steps
- `tools/php8/`: local Composer-based helper tooling for PHP 8 compatibility work

## Workflow

1. Inventory historic changes from the old repositories.
2. Split changes into tracks: `feature`, `i18n-content`, `i18n-infra`, `branding`.
3. Keep patches small and thematic.
4. Document upstream-friendly changes separately.
5. Keep deployment and environment knowledge in `phorge-intern` only.

## Translation Note

This repository uses PO as the main translation working format, but it also
defines a small local extension for rare native Phorge variant-array entries.

See:

- [translation/FORMAT.md](/home/peter/phorge-neu/phorge-patches/translation/FORMAT.md)

## Commit Message Rule

- Internal task references like `T1369` are acceptable in this repository.
- Target repositories that may later be proposed upstream, such as `phorge` or `phorge-arcanist`, should avoid internal task references in commit messages.
- For upstream submission branches, use neutral commit messages without internal ticket IDs.

## Relationship To Other Repositories

- `phorge`: target fork for server/core work
- `phorge-arcanist`: target fork for Arcanist, including later ports of former `libphutil` functionality
- `phorge-intern`: private operations, migration, and rollout documentation
- standalone `libphutil`: legacy/reference tree for archaeology, not the
  default target for current upstream-oriented fixes
