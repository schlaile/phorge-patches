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
  active workspace uses `phorge-neu/arcanist/`

### `005-replace-deprecated-utf8-encode-in-stripe-php.patch`

This patch fixes a PHP 8.2+ deprecation in the bundled `stripe-php` library.

The affected code path historically did this:

- detect whether a string is already UTF-8
- if not, call `utf8_encode($value)`

On modern PHP versions, `utf8_encode()` is deprecated. In this specific legacy
Stripe helper, the old behavior is semantically equivalent to converting from
ISO-8859-1 to UTF-8, so the patch uses:

- `mb_convert_encoding($value, 'UTF-8', 'ISO-8859-1')`

Why this replacement is appropriate here:

- it preserves the old intended conversion model of `utf8_encode()`
- it avoids the PHP 8.2+ deprecation
- the surrounding code already depends on `mb_detect_encoding()`, so using
  `mb_convert_encoding()` does not introduce a new extension family

Verification:

- syntax check of `externals/stripe-php/lib/Stripe/ApiRequestor.php`
- direct reproducer before/after with `error_reporting=E_ALL`:
  `Stripe_ApiRequestor::utf8(\"\\xE4\")`
- before: emitted a deprecation and returned `ä`
- after: returns `ä` without the deprecation
