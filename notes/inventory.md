# Inventory

Working document for inventorying historic local changes.

## Tracks

- `feature`: functional local product improvements
- `i18n-content`: translation content and missing `pht()` markers
- `i18n-infra`: translation infrastructure and import/build paths
- `branding`: internal "Phabricator" branding

## Historic Sources

- `~/phabricator`
- `~/libphutil`
- `~/arcanist`

## Export Status

- `phabricator`: 74 patches exported since the last `upstream/master` merge into `patches/phabricator-legacy/`
- `libphutil`: 2 patches exported since the last `upstream/master` merge into `patches/libphutil-legacy/`
- `arcanist`: no isolated historic local patch set identified yet

## Already Identified Local Non-Standard Changes

### feature

- Files: show a shareable file link in the detail dialog
- Calendar: configurable default edit policy
- Calendar: add calendar entry point to project navigation
- Calendar: improve tooltip, time, and weekday display
- Calendar: review current-day highlighting

## Already Identified Patch Files

### feature / check against upstream

- `patches/phabricator-legacy/0033-Make-calendar-day-view-honor-user-preferences-for-ho.patch`
- `patches/phabricator-legacy/0034-Show-translated-weekdays-in-calendar-day-view.patch`
- `patches/phabricator-legacy/0037-Added-event-description-to-event-tooltip-in-month-an.patch`
- `patches/phabricator-legacy/0041-Made-default-event-edit-policy-configurable.patch`
- `patches/phabricator-legacy/0042-Add-calendar-icon-to-project-navigation-view.patch`
- `patches/phabricator-legacy/0054-Ref-T788-enhance-the-visibility-of-the-current-day-i.patch`
- `patches/phabricator-legacy/0072-Files-show-file-location-in-file-detail-dialog-for-l.patch`

### i18n-content / check against upstream

- `patches/phabricator-legacy/0036-src-view-viewutils.php-some-calls-to-pht-were-missin.patch`
- `patches/phabricator-legacy/0057-made-string-Created-a-subtask-of.-translatable.patch`
- many `Additional-german-translations*.patch`

### i18n-infra / internal or redesign

- `patches/phabricator-legacy/0002-Empty-string-translation-is-harmful-for-gettext.patch`
- `patches/phabricator-legacy/0004-Made-translation-engine-work-again-with-german-trans.patch`
- `patches/phabricator-legacy/0010-Compiled-MO.patch`
- `patches/phabricator-legacy/0025-Removed-mo-file-from-git-since-every-recompile-is-a-.patch`
- `patches/phabricator-legacy/0026-Create-mo-directory-in-compile_mo_files-dirty-hack-i.patch`
- `patches/libphutil-legacy/0001-German-locale.patch`
- `patches/libphutil-legacy/0002-Made-translation-engine-work-again-with-german-trans.patch`

### i18n-content

- umfangreiche deutsche `de.po` in `phabricator`
- deutsche `de.po` in `libphutil`
- fehlende `pht()`-Markierungen im Kern

### i18n-infra

- `PhabricatorGermanTranslation`
- `PhabricatorGettextTranslator`
- `PhutilGermanLocale`
- Erweiterung in `PhutilTranslation`
- Build-Skripte fuer `.po`/`.mo`

### branding

- noch zu inventarisieren

## Next Steps

1. Export historic commits against the last Phacility upstream state.
2. Assign patches to tracks.
3. Mark upstream candidates.
