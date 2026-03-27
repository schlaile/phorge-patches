# Curation: Files and Calendar

Working list for functional product patches from the historic `phabricator` fork.

## Goal

- isolate small functional patches
- compare them against current Phorge
- decide: `already upstream`, `re-port`, or `drop`

## Candidates

### Files

- `patches/phabricator-legacy/0072-Files-show-file-location-in-file-detail-dialog-for-l.patch`
  Shows a directly shareable file link in the file detail dialog.

### Calendar

- `patches/phabricator-legacy/0033-Make-calendar-day-view-honor-user-preferences-for-ho.patch`
  Uses user time-format preferences in day view.

- `patches/phabricator-legacy/0034-Show-translated-weekdays-in-calendar-day-view.patch`
  Translates weekdays in calendar day view.

- `patches/phabricator-legacy/0037-Added-event-description-to-event-tooltip-in-month-an.patch`
  Adds event description to tooltip and list rendering.

- `patches/phabricator-legacy/0041-Made-default-event-edit-policy-configurable.patch`
  Makes the default edit policy for new events configurable.

- `patches/phabricator-legacy/0042-Add-calendar-icon-to-project-navigation-view.patch`
  Adds a calendar entry point to project navigation.

- `patches/phabricator-legacy/0054-Ref-T788-enhance-the-visibility-of-the-current-day-i.patch`
  Improves visibility of the current day.

## Preliminary Assessment

- `0072` is probably still useful and upstream-friendly.
- `0033`, `0034`, and `0037` are small UX/i18n-adjacent patches and good review candidates.
- `0041` looks more local or organizational and is probably less upstream-friendly.
- `0042` may still be useful, but depends heavily on current project/calendar navigation.
- `0054` needs to be checked against the current CSS/UI state.
