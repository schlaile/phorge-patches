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
  `phorge` tree expects a sibling repository named `arcanist/`

### `005-replace-deprecated-utf8-encode-in-stripe-php.patch`

This patch fixes a PHP 8.2+ deprecation in the bundled `stripe-php` library.

The affected code path historically did this:

- detect whether a string is already UTF-8
- if not, call `utf8_encode($value)`

On modern PHP versions, `utf8_encode()` is deprecated. In this specific legacy
Stripe helper, the old behavior is semantically equivalent to converting from
ISO-8859-1 to UTF-8.

Why this replacement is appropriate here:

- it preserves the old intended conversion model of `utf8_encode()`
- it avoids the PHP 8.2+ deprecation
- it establishes the intended conversion target and source encodings clearly

Verification:

- syntax check of `externals/stripe-php/lib/Stripe/ApiRequestor.php`
- direct reproducer before/after with `error_reporting=E_ALL`:
  `Stripe_ApiRequestor::utf8(\"\\xE4\")`
- before: emitted a deprecation and returned `ä`
- after: returns `ä` without the deprecation

### `006-use-utf-8-conversion-helper-in-stripe-php.patch`

This follow-up patch keeps the PHP 8 fix above but aligns the implementation
with the existing project convention for encoding conversions.

Phorge and Arcanist already provide and use:

- `phutil_utf8_convert($string, 'UTF-8', $from_encoding)`

This helper wraps `mb_convert_encoding()` with project-level checks and error
handling, and it is already used elsewhere in current code.

Why this follow-up exists:

- the first deprecation fix established the correct conversion semantics
- this second patch replaces the raw `mb_convert_encoding()` call with the
  established project helper
- this makes the vendor fix look less ad hoc and more consistent with the rest
  of the codebase

Verification:

- syntax check of `externals/stripe-php/lib/Stripe/ApiRequestor.php`
- direct reproducer with `scripts/__init_script__.php` loaded first, so the
  helper function is available
- output remains `ä` and no PHP 8.2+ deprecation is emitted

### `007-fix-fresh-storage-upgrade-with-legacy-database-patches.patch`

This patch fixes a fresh-install storage regression introduced by the newer
`.db` autopatch mechanism.

There were two separate issues:

- some historical application databases still have legacy SQL patches, but no
  longer had any database-creation patch at all: `chatlog`, `releeph`, and
  `phragment`
- `pastebin` did have a new `.db` patch, but it was marked dead, so the first
  legacy `pastebin` schema patch could run before the database existed

On top of that, the storage upgrade loop could continue scanning later patches
after applying one patch, instead of restarting from the beginning with the new
dependency state. This allowed later patches to leapfrog newly-unblocked
earlier patches during a fresh upgrade.

The patch therefore:

- adds missing `.db` autopatches for `chatlog`, `releeph`, and `phragment`
- makes the first legacy SQL patch for each of these databases, plus
  `pastebin`, explicitly depend on the matching `.db` patch
- treats `00.pastebin.0.db` as a real dependency in the legacy chain instead of
  a dead patch
- restarts patch selection after each successful patch application so
  dependencies are re-evaluated immediately

Verification:

- `bin/storage destroy --force`
- `php -d error_reporting=E_ALL ./bin/storage upgrade --force`
- result: fresh storage upgrade completed successfully, including schema
  adjustments and table analysis

### `008-avoid-null-array-key-in-phabricatorpolicyfilter.patch`

This patch avoids using a `null` viewer PHID as a cache key in
`PhabricatorPolicyFilter`.

On PHP 8.5, using `null` as an array offset is deprecated. The filter already
stores custom policies per viewer, and anonymous viewers can safely share the
same empty-string cache key, matching the normalization already used by `idx()`.

The change:

- normalizes the viewer PHID to `''` when absent
- uses that normalized key consistently when storing and reading cached custom
  policies

Verification:

- syntax check of `src/applications/policy/filter/PhabricatorPolicyFilter.php`
- code inspection of the anonymous-viewer path in `loadCustomPolicies()` and
  `checkCustomPolicy()`

### `009-avoid-null-array-keys-for-anonymous-viewers.patch`

This patch adds a few more small PHP 8.5 guards for anonymous viewers.

In these code paths, an anonymous viewer can not meaningfully be:

- a merchant member
- a project member for policy matching
- an already-answering user in Ponder

The change therefore avoids using `null` viewer PHIDs as array keys in:

- `PhortuneMerchant::hasAutomaticCapability()`
- `PhabricatorProjectsBasePolicyRule::willApplyRules()`
- `PonderAddAnswerView::render()`

Verification:

- syntax check of the three touched files
- code inspection of the anonymous-viewer branches

### `010-avoid-null-array-key-in-slowvoteembedview.patch`

This patch avoids using an anonymous viewer PHID as an array key in
`SlowvoteEmbedView`.

When response visibility is based on whether the viewer has voted, an anonymous
viewer can not have a vote and should simply see `false` here.

Verification:

- syntax check of `src/applications/slowvote/view/SlowvoteEmbedView.php`
- code inspection of the anonymous-viewer branch in `areResultsVisible()`

### `011-avoid-null-viewer-phids-in-query-paths.patch`

This patch avoids carrying anonymous viewer PHIDs into query-side lookups in:

- `DifferentialRevisionQuery`
- `PhabricatorSlowvoteQuery`

For anonymous viewers, these paths can not produce viewer-owned flags or viewer
choices anyway, so the correct behavior is simply:

- skip the owner-specific query
- attach empty viewer-specific results

This avoids both null array keys and unnecessary database work.

Verification:

- syntax check of both touched query classes
- code inspection of the anonymous-viewer branches in the query postprocessing

### `012-avoid-null-viewer-phid-in-legalpad-signature-paths.patch`

This patch avoids carrying an anonymous viewer PHID into Legalpad signature
queries and attachment state.

The affected paths are:

- `PhabricatorLegalpadSignaturePolicyRule`
- `LegalpadDocumentQuery`

For anonymous viewers, there is no signer PHID to filter by and no
viewer-specific signature attachment to record. The correct behavior is simply:

- skip the signer query
- skip attaching viewer-specific signature state

Verification:

- syntax check of both touched Legalpad classes
- code inspection of the anonymous-viewer branches in the policy and query
  paths

### `013-avoid-null-viewer-phid-in-calendar-event-search.patch`

This patch avoids requesting viewer-specific RSVP attachment data for anonymous
viewers in `PhabricatorCalendarEventSearchEngine`.

Anonymous viewers can not have RSVP state, so the search query should only call
`needRSVPs()` when a real viewer PHID exists.

Verification:

- syntax check of `src/applications/calendar/query/PhabricatorCalendarEventSearchEngine.php`
- code inspection of the anonymous-viewer branch in `newQuery()`
