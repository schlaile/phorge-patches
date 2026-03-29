# German Translation Work Area

This directory contains generated and hand-curated working files derived from
the historic German translation corpus.

Before editing `phorge-de-work.po`, read:

- [../../FORMAT.md](/home/peter/phorge-neu/phorge-patches/translation/FORMAT.md)

## Files

- `phorge-de-work.po`
  - first merged working PO created from:
    - `translation/de/legacy/phabricator-de.po`
    - `translation/import/current/phorge-current.pot`

## Status

- useful as a starting point
- not yet suitable as a release artifact
- contains many fuzzy matches that still need manual review

## Known Problems

- automatic `msgmerge` reuse overmatched some entries with similar placeholder
  structure but different meaning
- therefore fuzzy entries should be treated as review candidates, not accepted
  translations

## Intended Use

1. review fuzzy matches
2. keep good carry-over translations
3. discard bad matches
4. continue translating current Phorge strings in the established German voice

## Format Reminder

- normal entries should stay normal PO entries
- this repository does define one local PO extension for rare native variant
  arrays: `I18N-ARRAY`
- use it only when normal gettext plural handling is not enough
