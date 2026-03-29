# German Translation

Collection and later cleanup area for German translation data.

Format reference:

- [../FORMAT.md](../FORMAT.md)

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

## Context Rule

Translation review must use the current `phorge` module context for ambiguous
strings.

The PO file alone is not sufficient for many entries because the same English
text may mean different things in different applications or UI flows.

This is especially important for:

- short generic UI verbs
- activity/feed text
- placeholder-heavy sentences
- strings shared across Files, Audit, Herald, Calendar, and setup/admin flows

## Next Steps

1. review and prune bad fuzzy matches in `work/phorge-de-work.po`
2. review strings in the current module context before accepting translations
3. derive a cleaner consolidated German translation corpus from the legacy data
4. separate pure content from old `gettext` runtime assumptions
5. evaluate import/build integration against `wikimedia/phabricator-translations`

## Planned Native Export Path

Once the working PO is clean enough, the preferred target is a native
`PhutilTranslation` PHP class, not a gettext runtime integration.

Current plan:

- use PO as the main editing and review format
- generate PHP translation maps as a build artifact
- keep ordinary entries as ordinary `msgstr` values
- reserve a special `I18N-ARRAY` marker for rare entries which need native
  nested variant arrays beyond normal gettext plural forms
- for the exact repository convention, read
  [../FORMAT.md](../FORMAT.md)
