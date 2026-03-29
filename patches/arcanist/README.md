# Arcanist Patches

Curated patch series against `phorge-arcanist`.

Later ports of historic `libphutil` changes belong here as well, where they map into the newer integrated Arcanist structure.

## Current Series Notes

### `001-avoid-deprecated-xml-entity-loader-call-on-php-8.patch`

This patch narrows an old XML hardening call in the Arcanist bootstrap path:

- `libxml_disable_entity_loader()` was historically used as a defensive
  measure
- on PHP 8+, external entity loading is disabled by default and the function
  itself is deprecated

The patch only calls the function on PHP 7 and older:

- keeps the legacy hardening behavior where it was still relevant
- avoids a pointless deprecated call on modern runtimes
- keeps the change small and bootstrap-local

Verification:

- syntax check of `support/init/init-script.php`
- bootstrap smoke test via `require_once "scripts/__init_script__.php"` under
  PHP 8.4 without additional warnings

### `002-route-modern-scripts-arcanist-commands-through-runtime.patch`

This patch fixes a launcher split between the legacy `scripts/arcanist.php`
entry point and the newer `ArcanistRuntime` toolset dispatcher.

Before this change:

- direct calls like `scripts/arcanist.php help` selected the modern
  `ArcanistHelpWorkflow`
- the legacy launcher still executed it through `->run()`
- modern workflows like `help` implement `newPhutilWorkflow()` /
  `runWorkflow()` instead, so the direct script path failed with
  `PhutilMethodNotImplementedException`

The patch keeps the modern/legacy boundary intact instead of teaching
`ArcanistWorkflow` to bridge both execution models:

- `scripts/arcanist.php` now delegates direct modern commands to
  `ArcanistRuntime`
- `--help` paths are also delegated so cases like `diff --help` land in the
  existing runtime help bridge
- genuine legacy workflows still stay in the legacy launcher

A small environment marker prevents recursion when `ArcanistRuntime` falls
back into `scripts/arcanist.php` for an actual legacy workflow.

Verification:

- syntax checks of `scripts/arcanist.php` and `src/runtime/ArcanistRuntime.php`
- `php scripts/arcanist.php version`
- `php scripts/arcanist.php help`
- `php scripts/arcanist.php help diff`
- `php scripts/arcanist.php diff --help`
- `php scripts/arcanist.php diff` still falls through to the legacy path and
  reports the expected working-copy usage error outside a repository
