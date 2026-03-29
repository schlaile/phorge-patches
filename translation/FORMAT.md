# Translation Format

Reference for the working translation format in this repository.

## Purpose

- use gettext PO as the main human editing and review format
- do not treat PO as the final runtime format in Phorge
- generate native `PhutilTranslation` PHP classes from PO as a build step

## Important Local Extension

This repository extends normal PO usage for rare translation entries which
cannot be represented cleanly with ordinary gettext plural handling.

Normal entries should remain normal PO:

- ordinary `msgid`
- ordinary `msgstr`
- ordinary `msgid_plural` / `msgstr[n]` when gettext plural forms are enough

Exceptional entries may use a special marker in `msgstr`:

- first line exactly `I18N-ARRAY`
- remaining content is a restricted array literal
- this data is converted into the nested PHP array format expected by
  `PhutilTranslation`

## `I18N-ARRAY` Shape

```po
msgstr ""
"I18N-ARRAY\n"
"[\n"
"  ['first singular', 'first plural'],\n"
"  ['second singular', 'second plural']\n"
"]"
```

Rules:

- no embedded PHP code
- no JSON blob
- no free-form expression language
- use only for true exceptional cases
- keep ordinary translations as ordinary PO whenever possible

## Where This Is Implemented

- policy and rationale:
  [translation/import/README.md](import/README.md)
- German translation working area:
  [translation/de/README.md](de/README.md)
- current German work file context:
  [translation/de/work/README.md](de/work/README.md)
- generator and validator:
  [scripts/po_to_translation.php](../scripts/po_to_translation.php)

## Working Rule For Agents

If you touch PO files in this repository:

- assume normal PO first
- check this file before introducing any plural or variant workaround
- use `I18N-ARRAY` only when the native Phorge translation structure requires
  something beyond normal gettext plural forms
