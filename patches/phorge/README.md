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

### `017-avoid-null-string-arguments-in-calendar-import-paths.patch`

This follow-up patch fixes the same PHP 8 string-argument deprecation pattern
in a few remaining Calendar import and lookup paths.

The affected code still passed possibly-null values into string functions like:

- `strtolower()`
- `substr()`
- `preg_match()`
- `strlen()`

On older PHP this implicitly behaved like `null -> ''`. On PHP 8, it emits
deprecations. These casts keep the historical behavior in place while leaving
the later validation and control flow unchanged.

The patch covers:

- `CalendarTimeUtil`
- `PhabricatorCalendarEventPHIDType`
- `PhabricatorCalendarImportEngine`

Verification:

- syntax check of all three touched files
- targeted `rector` dry-run on the same files after the patch
- result: only a separate unused-catch cleanup remains; no further strict
  string-argument fixes are suggested on these files

### `018-fix-storage-upgrade-dependency-for-maniphest-duplicate-migration.patch`

This patch fixes a long-jump storage upgrade failure around the historical
Maniphest duplicate-migration patch and later worker rebuild patches.

The first observed failure was in:

- `resources/sql/autopatches/20170528.maniphestdupes.php`

That historical PHP patch uses current application query code while upgrading
old data. On modern Phorge, this code path can schedule worker tasks. Current
worker tasks write the nullable `containerPHID` column, but this column only
arrives later in the schema history via:

- `resources/sql/autopatches/20210122.queuecontainer.01.sql`

On an upgrade from an older Phabricator schema, the result is a crash like:

- `Unknown column 'containerPHID' in 'field list'`

An earlier attempt to solve this with a direct dependency from the 2017 patch
to the 2021 schema patch turned out to be wrong. Because `20170528` already
has later default-phase successors, that dependency creates an implicit cycle
in the default patch chain and allows the upgrade loop to jump ahead to
worker-phase rebuild patches instead.

The corrective change therefore takes a different shape:

- `20170528.maniphestdupes.php` now creates `containerPHID` on the worker task
  tables if the column is still missing
- the `20210122.queuecontainer.01.sql` patch key is kept, but it is routed to a
  PHP patch implementation which performs the same column additions idempotently
  instead of crashing when the columns already exist

Why this shape was chosen:

- it keeps the historical patch ordering intact
- it fixes the first failing 2017 migration and the later 2019 worker rebuild
  patches with the same early schema guard
- it avoids relying on database-specific `ADD COLUMN IF NOT EXISTS` syntax in
  historical storage patches

Verification:

- syntax check of:
  `resources/sql/autopatches/20170528.maniphestdupes.php`,
  `resources/sql/patches/20210122.queuecontainer.php`,
  `src/infrastructure/storage/patch/PhabricatorBuiltinPatchList.php`
- patch graph inspection confirms:
  `20170528.maniphestdupes.php` is back on its original dependency chain
- patch graph inspection confirms:
  `20210122.queuecontainer.01.sql` still keeps its original key and default
  phase, but now executes through the idempotent PHP wrapper

### `019-make-phriction-document-actions-layout-configurable.patch`

This patch makes the Phriction document action layout configurable instead of
hard-coding one side in the older dropdown-versus-curtain design tradeoff.

Background:

- Phriction originally used a compact dropdown for document actions
- later, it was changed to a permanently visible curtain so actions were not
  hidden in a menu
- both approaches have real tradeoffs: the curtain keeps actions visible, but
  it can waste a large amount of space on index-like or nearly empty wiki
  pages where the document hierarchy is more important than the page body

The patch adds a small application config option:

- `phriction.document-actions = curtain|dropdown`

with the current behavior (`curtain`) kept as the default.

This keeps existing installs unchanged while allowing administrators to switch
Phriction back to a compact header dropdown if that better fits their wiki
content and navigation patterns.

Verification:

- `arc liberate --` to regenerate `src/__phutil_library_map__.php`
- `bin/config list` confirms that `phriction.document-actions` is registered
- syntax check of `src/applications/phriction/config/PhabricatorPhrictionConfigOptions.php`
- syntax check of `src/applications/phriction/controller/PhrictionDocumentController.php`

### `020-make-logged-out-home-behavior-configurable.patch`

This patch makes the behavior of the home URI for logged-out visitors
configurable.

Background:

- the modern Home controller explicitly supports logged-out viewers
- this is useful for public installs where anonymous users should land on a
  public dashboard
- private installs often want the older behavior instead, where visiting `/`
  while logged out takes the user directly to the login screen

The patch adds:

- `home.logged-out-mode = home|login`

with the current behavior (`home`) kept as the default.

When set to `login`, the Home controller redirects logged-out visitors to
`/auth/start/` and preserves the original target as `next`, so they return to
the requested home URI after login.

Verification:

- `arc liberate --` to regenerate `src/__phutil_library_map__.php`
- `bin/config list` confirms that `home.logged-out-mode` is registered
- syntax check of `src/applications/home/config/PhabricatorHomeConfigOptions.php`
- syntax check of `src/applications/home/controller/PhabricatorHomeMenuItemController.php`
