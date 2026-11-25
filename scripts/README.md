# Scripts

Place for helper scripts, for example:

- export of historic patch series
- application of curated patches to target repositories
- translation build/import helpers

## Current Helpers

- `po_to_translation.php`
  - validate a PO file for native export
  - generate a native `PhutilTranslation` PHP class from a PO file
  - validates and parses the planned `I18N-ARRAY` escape format

- `extract_to_pot.py`
  - build `translation/import/current/phorge-current.pot` from the
    `src/.cache/i18n_strings.json` written by `bin/i18n extract`
- `po_sync.py`
  - synchronize the German work PO with that POT without reformatting it:
    unused entries become obsolete, new strings are appended with references
  - `--todo` writes a JSON work list with `msgmerge` hints for translators,
    `--translations` fills new entries from a JSON object msgid -> msgstr
