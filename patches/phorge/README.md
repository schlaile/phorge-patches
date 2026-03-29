# Phorge Patches

Curated patch series against the `phorge` repository.

Recommendation:

- keep patches small and thematic
- use filenames with sequence and topic, for example `001-files-share-link.patch`

## Current Series Notes

### `004-avoid-deprecated-xml-entity-loader-call-on-php-8.patch`

This patch applies the same narrow PHP 8 bootstrap guard in the Phorge server
startup path:

- `libxml_disable_entity_loader()` was a valid legacy hardening step on older
  PHP versions
- on PHP 8+, the function is deprecated and no longer needed for the intended
  protection

The change gates the call behind `PHP_VERSION_ID < 80000`, which preserves
legacy behavior while avoiding a deprecated no-op on modern runtimes.

Verification:

- syntax check of `support/startup/PhabricatorStartup.php`
- a full bootstrap smoke test was not possible in-place because this local
  `phorge` tree expects a sibling repository named `arcanist/`, while the
  active workspace uses `phorge-arcanist/`
