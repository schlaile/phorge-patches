# Translation Import

Working area for the translation import path.

Current working hypothesis:

- preserve German translation content from the historic `.po` files
- avoid keeping the old `gettext` runtime path as the target architecture if possible
- evaluate a native or build-based import path instead
- use `wikimedia/phabricator-translations` as the main reference for Translatewiki import/export

## Current Direction

- keep PO as the primary human working format for translation review and editing
- generate native `PhutilTranslation` PHP classes from PO as a build step
- target an upstream-friendly PHP implementation instead of reviving a gettext
  runtime path

## Planned Escape Hatch For Variant Arrays

Most strings should remain plain PO translations.

Some Phorge/libphutil translations can express richer nested variant arrays
than gettext PO can represent directly. For these exceptional entries, the
current plan is to support a small explicit escape format inside `msgstr`.

Planned marker:

- first line exactly `I18N-ARRAY`
- the remaining content is parsed as a restricted array literal
- this data is converted into the native nested PHP array expected by
  `PhutilTranslation`

Planned shape:

```po
msgstr ""
"I18N-ARRAY\n"
"[\n"
"  ['first singular', 'first plural'],\n"
"  ['second singular', 'second plural']\n"
"]"
```

Design constraints:

- no embedded PHP code
- no general expression language
- no free-form magic comments required
- minimal escaping burden for translators
- readable enough to review in diffs
- reserved for true exceptional cases, not normal strings

## Open Runtime Caveat

- `de_DE` exists as a locale in libphutil
- however, plural variant selection in the current translator code appears to
  special-case only some locales
- before deployment, native runtime support for German plural arrays must be
  validated or completed
