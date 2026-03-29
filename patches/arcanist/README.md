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
