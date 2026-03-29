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

### `012-guard-null-viewer-phids-in-viewer-specific-search-paths.patch`

This patch consolidates the repeated PHP 8.5 null-viewer fixes across
viewer-specific search engines, search controllers, and related query paths.

The common pattern is the same throughout:

- anonymous viewers do not have a user PHID
- viewer-scoped builtins, filters, lookups, and attachments should therefore
  not build parameters from `null`
- on PHP 8.5, these old paths otherwise drift into deprecated `null` array key
  and `array(null)` behavior

The patch covers:

- builtin query handlers in Audit, Differential, Dashboard, Conduit,
  Harbormaster, MetaMTA, Legalpad, and Phurl
- viewer-scoped search filters in Calendar, Feed, People, and Phortune
- central search configuration and saved-query paths
- related viewer-specific attachment and policy helpers in Legalpad and
  Subscriptions

Verification:

- generated directly from `git diff 5e375dc36a^..1a1967bc9f` in `phorge`
- file list of the curated patch compared against the same commit range with no
  missing or extra files
- syntax check previously performed while landing the individual source commits

### `013-guard-remaining-viewer-specific-builtin-searches.patch`

This patch finishes the same PHP 8.5 builtin-query guard pattern for the
remaining search engines which:

- only advertise certain builtins to logged-in users
- but could still build viewer-specific query parameters from a null PHID when
  reached directly

The affected engines are:

- Conpherence
- Files
- Fund
- Herald
- Maniphest
- OAuth Server
- Owners
- Paste
- Pholio
- Ponder
- Projects
- Slowvote

Verification:

- syntax check of all twelve touched search engine classes
- code inspection of the viewer-specific builtin branches

### `014-guard-remaining-authored-builtin-searches.patch`

This small follow-up closes the same authored-builtin guard pattern in the two
remaining search engines which still built author filters from the current
viewer PHID:

- Countdown
- Macro

Verification:

- syntax check of both touched search engine classes
- code inspection of the authored builtin branches

### `015-avoid-null-viewer-key-in-conpherence-menu-item.patch`

This patch fixes a small PHP 8.5 null-key edge in the Conpherence profile menu
item.

Anonymous viewers can not be participants in a room, so the menu item should
not probe the participant map with a null viewer PHID before checking unread
state.

Verification:

- syntax check of `search/menuitem/PhabricatorConpherenceProfileMenuItem.php`
- code inspection of the anonymous-viewer path in `newMenuItemViewList()`

### `016-avoid-null-string-arguments-in-calendar-parser.patch`

This patch fixes a small cluster of PHP 8 string-argument deprecations in the
Calendar parser and ICS import/export code.

The affected paths historically relied on old PHP behavior where `null` was
implicitly coerced to `''` when passed to string functions like:

- `preg_match()`
- `explode()`
- `strlen()`
- `ltrim()`
- `base64_decode()`

On PHP 8, these calls emit deprecations instead. In these parser boundaries,
casting to string preserves the old effective behavior: invalid or missing
input still flows into the existing validation and exception paths, but
without raising runtime deprecations first.

The patch covers:

- `PhutilCalendarAbsoluteDateTime`
- `PhutilCalendarDuration`
- `PhutilCalendarRecurrenceRule`
- `PhutilICSParser`
- `PhutilICSWriter`

Verification:

- syntax check of all five touched files
- direct bootstrap reproducer with `error_reporting=E_ALL` for:
  - `PhutilCalendarAbsoluteDateTime::newFromISO8601(null)`
  - `PhutilCalendarDuration::newFromISO8601(null)`
  - `PhutilCalendarRecurrenceRule::newFromRRULE(null)`
- result: all three now reach their normal exception paths without PHP 8
  deprecation noise
