# Curation: Files and Calendar

Arbeitsliste fuer funktionale Produktpatches aus dem historischen `phabricator`-Fork.

## Ziel

- kleine funktionale Patches isolieren
- gegen aktuellen Phorge-Stand pruefen
- entscheiden: `upstream vorhanden`, `neu portieren`, `verwerfen`

## Kandidaten

### Files

- `patches/phabricator-legacy/0072-Files-show-file-location-in-file-detail-dialog-for-l.patch`
  Zeigt im Dateidetaildialog einen direkt teilbaren Dateilink an.

### Calendar

- `patches/phabricator-legacy/0033-Make-calendar-day-view-honor-user-preferences-for-ho.patch`
  Nutzt Benutzerpraeferenz fuer Zeitanzeige in der Tagesansicht.

- `patches/phabricator-legacy/0034-Show-translated-weekdays-in-calendar-day-view.patch`
  Uebersetzt Wochentage in der Kalender-Tagesansicht.

- `patches/phabricator-legacy/0037-Added-event-description-to-event-tooltip-in-month-an.patch`
  Ergaenzt Tooltip-/Listendarstellung um Event-Beschreibung.

- `patches/phabricator-legacy/0041-Made-default-event-edit-policy-configurable.patch`
  Macht die Default-Edit-Policy fuer neue Events konfigurierbar.

- `patches/phabricator-legacy/0042-Add-calendar-icon-to-project-navigation-view.patch`
  Fuegt Kalendereinstieg in der Projekt-Navigation hinzu.

- `patches/phabricator-legacy/0054-Ref-T788-enhance-the-visibility-of-the-current-day-i.patch`
  Verbessert die Sichtbarkeit des aktuellen Tages.

## Vorlaeufige Bewertung

- `0072` ist wahrscheinlich weiterhin nuetzlich und upstream-faehig.
- `0033`, `0034`, `0037` sind kleine UX-/i18n-nahe Patches und gute Pruefkandidaten.
- `0041` ist eher lokal/organisatorisch motiviert und wahrscheinlich weniger upstream-faehig.
- `0042` ist nuetzlich, aber stark von der heutigen Projekt-/Kalendernavigation abhaengig.
- `0054` muss gegen den heutigen CSS-/UI-Stand geprueft werden.
