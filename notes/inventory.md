# Inventory

Arbeitsdokument fuer die Inventarisierung historischer lokaler Aenderungen.

## Tracks

- `feature`: funktionale lokale Produktverbesserungen
- `i18n-content`: Uebersetzungsinhalte, fehlende `pht()`-Markierungen
- `i18n-infra`: technische Uebersetzungsinfrastruktur, Import-/Build-Pfade
- `branding`: internes "Phabricator"-Branding

## Historische Quellen

- `~/phabricator`
- `~/libphutil`
- `~/arcanist`

## Exportstand

- `phabricator`: 74 Patches seit letztem `upstream/master`-Merge exportiert nach `patches/phabricator-legacy/`
- `libphutil`: 2 Patches seit letztem `upstream/master`-Merge exportiert nach `patches/libphutil-legacy/`
- `arcanist`: aktuell keine gesonderten historischen lokalen Patches isoliert

## Bereits identifizierte lokale Nicht-Standard-Aenderungen

### feature

- Files: Dateilink im Detaildialog anzeigen
- Kalender: konfigurierbare Default-Edit-Policy
- Kalender: Projekt-Navigation um Kalendereinstieg erweitern
- Kalender: Tooltip-/Zeit-/Wochentagsdarstellung verbessern
- Kalender: Hervorhebung des aktuellen Tages pruefen

## Bereits klar identifizierte Patchdateien

### feature / upstream-pruefen

- `patches/phabricator-legacy/0033-Make-calendar-day-view-honor-user-preferences-for-ho.patch`
- `patches/phabricator-legacy/0034-Show-translated-weekdays-in-calendar-day-view.patch`
- `patches/phabricator-legacy/0037-Added-event-description-to-event-tooltip-in-month-an.patch`
- `patches/phabricator-legacy/0041-Made-default-event-edit-policy-configurable.patch`
- `patches/phabricator-legacy/0042-Add-calendar-icon-to-project-navigation-view.patch`
- `patches/phabricator-legacy/0054-Ref-T788-enhance-the-visibility-of-the-current-day-i.patch`
- `patches/phabricator-legacy/0072-Files-show-file-location-in-file-detail-dialog-for-l.patch`

### i18n-content / upstream-pruefen

- `patches/phabricator-legacy/0036-src-view-viewutils.php-some-calls-to-pht-were-missin.patch`
- `patches/phabricator-legacy/0057-made-string-Created-a-subtask-of.-translatable.patch`
- zahlreiche `Additional-german-translations*.patch`

### i18n-infra / intern oder neu aufsetzen

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

## Naechste Schritte

1. Historische Commits gegen den letzten Phacility-Upstream-Stand exportieren.
2. Patches den Tracks zuordnen.
3. Upstream-Kandidaten markieren.
