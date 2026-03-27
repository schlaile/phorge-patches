# Legacy Patch Review

Review of all historic local patches exported from the old `phabricator` and
`libphutil` repositories.

## Summary

### phabricator-legacy

- total patches: 74
- translation content: dominant majority
- translation infrastructure: small but important subset
- functional patches:
  - already ported to current `phorge`: 4
  - already upstream or obsolete in current `phorge`: several
  - still open / needs redesign: a small remainder

### libphutil-legacy

- total patches: 2
- both belong to translation infrastructure / locale support
- these need to be reevaluated against the newer `phorge-arcanist` structure

## Fully Reviewed Classification

### A. Already Ported To Current `phorge`

- `0036-src-view-viewutils.php-some-calls-to-pht-were-missin.patch`
  Ported as part of `001-files-share-link-and-relative-date-i18n.patch`

- `0037-Added-event-description-to-event-tooltip-in-month-an.patch`
  Ported as part of `002-calendar-weekday-translation-and-tooltip-description.patch`

- `0042-Add-calendar-icon-to-project-navigation-view.patch`
  Reimplemented in a modern form as `003-project-calendar-profile-menu-item.patch`

- `0072-Files-show-file-location-in-file-detail-dialog-for-l.patch`
  Ported as part of `001-files-share-link-and-relative-date-i18n.patch`

### B. Already Upstream / Obsolete In Current `phorge`

- `0033-Make-calendar-day-view-honor-user-preferences-for-ho.patch`
  Current `PHUICalendarDayView` already uses `phabricator_time()`.

- `0041-Made-default-event-edit-policy-configurable.patch`
  Current `PhabricatorCalendarApplication` already has custom capabilities and
  current Calendar edit-policy support should be reviewed before any re-port.
  Old patch appears largely superseded.

- `0054-Ref-T788-enhance-the-visibility-of-the-current-day-i.patch`
  Current calendar CSS already has dedicated current-day styling.

- `0057-made-string-Created-a-subtask-of.-translatable.patch`
  Old target flow no longer exists in the same form. Needs redesign if desired,
  not direct port.

- `0007-Small-mistake-in-merge-didn-t-remove-GarbageCollecto.patch`
  Historical merge-fix only, obsolete.

- `0010-Compiled-MO.patch`
  Generated artifact only, obsolete as a standalone patch.

- `0016-New-mo-file.patch`
  Generated artifact only, obsolete as a standalone patch.

- `0020-New-mo-file.patch`
  Generated artifact only, obsolete as a standalone patch.

- `0025-Removed-mo-file-from-git-since-every-recompile-is-a-.patch`
  Historical repository hygiene for generated files, only relevant if a `.mo`
  workflow survives.

### C. Translation Infrastructure

#### phabricator-legacy

- `0001-translated-getName-was-already-there.patch`
- `0002-Empty-string-translation-is-harmful-for-gettext.patch`
- `0004-Made-translation-engine-work-again-with-german-trans.patch`
- `0008-additional-german-translations-small-cosmetic-change.patch`
- `0026-Create-mo-directory-in-compile_mo_files-dirty-hack-i.patch`

These are tied to the old runtime/import strategy around:

- `PhabricatorGermanTranslation`
- `PhabricatorGettextTranslator`
- `.po` / `.mo` build flow
- legacy default-locale assumptions

Status:

- keep for reference
- do not port blindly
- reevaluate against native Phorge translation support plus
  `wikimedia/phabricator-translations`

#### libphutil-legacy

- `0001-German-locale.patch`
- `0002-Made-translation-engine-work-again-with-german-trans.patch`

Status:

- keep as migration source
- later map into current `phorge-arcanist`

### D. Translation Content

These are primarily content patches to German translation data. They should be
treated as a consolidated translation source, not re-ported one by one.

- `0003-German-translation-update.patch`
- `0005-Additional-german-translations-mostly-calendar-app.patch`
- `0006-Additional-german-translations.patch`
- `0009-Additional-german-translations.patch`
- `0011-Additional-german-translations.patch`
- `0012-Bugfix-german-translation-of-Edit-Details-was-wrong.patch`
- `0013-Additional-german-translations.patch`
- `0014-Additional-german-translations-Conpherence.patch`
- `0015-Additional-german-translations.patch`
- `0017-Additional-german-translations.patch`
- `0018-Additional-german-translations.patch`
- `0019-Additional-german-translations.patch`
- `0021-Additional-german-translations-Spaces.patch`
- `0022-Additional-german-translations.patch`
- `0023-Additional-german-translations.patch`
- `0024-Additional-german-translations.patch`
- `0027-Additional-german-translations.patch`
- `0028-Additional-german-translations.patch`
- `0029-Additional-german-translations.patch`
- `0030-Additional-german-translations.patch`
- `0031-Additional-german-translations.patch`
- `0032-Additional-german-translations.patch`
- `0035-Additional-german-translations.patch`
- `0038-Small-german-translation-fixes.patch`
- `0039-Additional-german-translations.patch`
- `0040-Additional-german-translations.patch`
- `0043-Some-german-translation-fixes-for-blocked-tasks.patch`
- `0044-German-translation-fix.patch`
- `0045-German-translation-fixes.patch`
- `0046-Additional-german-translations-phriction.patch`
- `0047-Small-german-translation-fix.patch`
- `0048-Additional-german-translations-flags.patch`
- `0049-German-translation-fix.patch`
- `0050-Additional-german-translations.patch`
- `0051-Additional-german-translations.patch`
- `0052-Additional-german-translations.patch`
- `0053-Additional-german-translations.patch`
- `0055-Additional-german-translations.patch`
- `0056-Additional-german-translations.patch`
- `0058-Additional-german-translations.patch`
- `0059-Additional-german-translations-conpherence.patch`
- `0060-Additional-German-translations-audit.patch`
- `0061-Additional-german-translations-Herald.patch`
- `0062-Additional-german-translations-Herald.patch`
- `0063-Additional-german-translations-Herald.patch`
- `0064-Additional-German-translations-Audit-Herald.patch`
- `0065-Additional-german-translations-audit.patch`
- `0066-Additional-german-translations-audit-differential.patch`
- `0067-Additional-german-translations-audit.patch`
- `0068-Some-german-translation-fixes-Herald-Audit.patch`
- `0069-Additional-german-translations-phrequent-time-tracki.patch`
- `0070-Additional-german-translations-events.patch`
- `0071-Additional-german-translations-policy.patch`
- `0073-Additional-german-translations-slowvote.patch`
- `0074-Additional-german-translations-password-reset-email.patch`

Status:

- preserve as historical translation corpus
- consolidate into a single maintained German data source
- map against current string inventory instead of replaying patch-by-patch

### E. Remaining Functional / UX Patches Worth Separate Evaluation

- `0034-Show-translated-weekdays-in-calendar-day-view.patch`
  Conceptually still valid; effectively covered by the current Week-View port
  and broader translation work. No direct standalone port needed now.

### F. Needs Redesign, Not Direct Port

- `0057-made-string-Created-a-subtask-of.-translatable.patch`
  The old notice-based create flow is gone; any equivalent behavior would need
  to be reintroduced in the current edit-engine/UI flow intentionally.

## Recommended Next Actions

1. Continue porting only small, clearly valuable functional patches.
2. Treat German translation patches as one consolidated data source.
3. Treat `libphutil` patches as migration reference for `phorge-arcanist`.
4. Avoid replaying generated `.mo` artifacts or old `gettext` runtime patches
   without a fresh design decision.
