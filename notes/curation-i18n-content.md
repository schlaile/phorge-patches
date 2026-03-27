# Curation: i18n Content

Arbeitsliste fuer inhaltliche Uebersetzungsarbeit.

## Ziel

- deutsche Uebersetzungsinhalte von Infrastruktur trennen
- fehlende `pht()`-Markierungen isolieren
- moegliche Upstream-Beitraege markieren

## Kandidaten

### Fehlende oder verbesserte Translatability

- `patches/phabricator-legacy/0036-src-view-viewutils.php-some-calls-to-pht-were-missin.patch`
  Markiert `today`, `yesterday` und `on %s` korrekt fuer Uebersetzung.

- `patches/phabricator-legacy/0057-made-string-Created-a-subtask-of.-translatable.patch`
  Macht die Meldung "Created a subtask of ..." ueber `pht()` uebersetzbar.

### Deutsche Inhalts-Patches

- `patches/phabricator-legacy/0003-German-translation-update.patch`
- `patches/phabricator-legacy/0005-Additional-german-translations-mostly-calendar-app.patch`
- `patches/phabricator-legacy/0006-Additional-german-translations.patch`
- `patches/phabricator-legacy/0008-additional-german-translations-small-cosmetic-change.patch`
- weitere `Additional-german-translations*.patch`
- `patches/phabricator-legacy/0074-Additional-german-translations-password-reset-email.patch`

### Legacy libphutil Translation Content

- `translation/de/` soll spaeter die konsolidierten deutschen Daten aufnehmen
- `patches/libphutil-legacy/0001-German-locale.patch`
  enthaelt neben Infrastruktur auch die Einfuehrung der deutschen Locale

## Vorlaeufige Bewertung

- `0036` und `0057` sind gute Upstream-Kandidaten.
- der eigentliche deutsche Uebersetzungsinhalt ist fachlich wertvoll, sollte aber bereinigt und auf aktuellen Stringbestand gemappt werden.
- die vielen kleinteiligen `Additional-german-translations*.patch` sollten nicht einzeln neu portiert, sondern in konsolidierte Datenbasis ueberfuehrt werden.
