# German Translation

Collection and later cleanup area for German translation data.

Planned contents:

- historic `de.po` from `phabricator`
- historic `de.po` from `libphutil`
- mapping to current Phorge and Arcanist state
- later cleanup for possible upstream contributions

## Current Legacy Sources

- `legacy/phabricator-de.po`
  - source: historic local `phabricator` fork
  - `msgid` count: about 12,346
  - translated entries: about 3,330
  - `PO-Revision-Date`: 2016-11-02 18:07+0100

- `legacy/libphutil-de.po`
  - source: historic local `libphutil` fork
  - `msgid` count: 67
  - translation coverage appears to be very low or mostly incomplete

## Current Working Basis

- `../import/current/phorge-current.pot`
  - current string inventory extracted from the local `phorge` checkout
  - current `msgid` count: about 17,261

- `work/phorge-de-work.po`
  - first merged working PO derived from the historic local corpus and the
    current `phorge` POT snapshot
  - current `msgfmt --statistics` result:
    - translated: 1,877
    - fuzzy: 4,578
    - untranslated: 10,805

## Important Caveat

The merged working PO is useful as a starting point, but it is not yet clean.

Automatic `msgmerge` reuse created a noticeable number of incorrect fuzzy
matches. Example classes include unrelated file/activity strings being mapped
onto audit or hosting strings only because the placeholder shape happened to
match.

This means:

- the historic German corpus remains valuable
- the merged working PO is a review queue, not production-ready translation
- fuzzy entries must be reviewed aggressively before translating new strings on
  top of them

## Next Steps

1. review and prune bad fuzzy matches in `work/phorge-de-work.po`
2. derive a cleaner consolidated German translation corpus from the legacy data
3. separate pure content from old `gettext` runtime assumptions
4. evaluate import/build integration against `wikimedia/phabricator-translations`
