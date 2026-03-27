# Curation: i18n Content

Working list for translation content work.

## Goal

- separate German translation content from infrastructure
- isolate missing `pht()` markers
- mark possible upstream contributions

## Candidates

### Missing or Improved Translatability

- `patches/phabricator-legacy/0036-src-view-viewutils.php-some-calls-to-pht-were-missin.patch`
  Marks `today`, `yesterday`, and `on %s` properly for translation.

- `patches/phabricator-legacy/0057-made-string-Created-a-subtask-of.-translatable.patch`
  Makes the "Created a subtask of ..." message translatable via `pht()`.

### German Content Patches

- `patches/phabricator-legacy/0003-German-translation-update.patch`
- `patches/phabricator-legacy/0005-Additional-german-translations-mostly-calendar-app.patch`
- `patches/phabricator-legacy/0006-Additional-german-translations.patch`
- `patches/phabricator-legacy/0008-additional-german-translations-small-cosmetic-change.patch`
- further `Additional-german-translations*.patch`
- `patches/phabricator-legacy/0074-Additional-german-translations-password-reset-email.patch`

### Legacy libphutil Translation Content

- `translation/de/` will later hold the consolidated German data
- `patches/libphutil-legacy/0001-German-locale.patch`
  contains locale introduction in addition to infrastructure

## Preliminary Assessment

- `0036` and `0057` are good upstream candidates.
- the actual German translation content is valuable, but should be cleaned up and mapped to the current string set.
- the many small `Additional-german-translations*.patch` should not be re-ported one by one, but consolidated into a single maintained data base.
