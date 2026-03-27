# German Translation Work Area

This directory contains generated and hand-curated working files derived from
the historic German translation corpus.

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
