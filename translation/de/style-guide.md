# German Translation Style Guide

Working style guide derived from the historic local German translation corpus.

## Goal

Preserve the voice of the original product text in German, including humor,
without flattening everything into generic UI language.

## Core Principles

### 1. Preserve intent before wording

Translate what the text is trying to do:

- neutral UI text should stay neutral
- playful text should stay playful
- absurd or dry jokes should remain recognizable as jokes
- warnings and error messages should remain clear first

### 2. Do not sand off the original humor

If the original text is intentionally silly, cheeky, dramatic, or weird, the
German translation should usually carry that across instead of normalizing it.

Examples from the legacy corpus:

- `"Condolences on forgetting your password ..."` became
  `"Mein aufrichtiges Beileid zum Vergessen Deines Passworts ..."`
- the sticky-note joke was preserved and adapted naturally into German
- `"Clear sailing ahead."` was not translated as a dry technical statement

### 3. Prefer idiomatic German over literal German

Good translations should read like real German product text, not like direct
 word-for-word English mappings.

Prefer:

- natural phrasing
- good rhythm
- correct register for the UI context

Avoid:

- rigid literal calques
- English syntax in German
- over-formal wording where the source is casual

### 4. Keep product voice consistent

The historic corpus suggests this voice:

- direct address to the user is acceptable
- light humor is acceptable
- playful exaggeration is acceptable in clearly playful strings
- but technical/admin/debug messages should not become goofy unless the source
  already is

### 5. Be careful with register

Use tone based on context:

- user-facing application text: clear, natural, sometimes playful
- setup/admin text: direct and precise
- debugging/internals: primarily correct and readable
- emails: may be more conversational if the original is conversational

## Preferred Practices

### Preserve jokes by adapting, not copying mechanically

If the English joke depends on wording that does not survive literally in
German, rewrite it so the effect survives.

### Preserve rhetorical energy

Exclamation marks, pauses, and rhythm often carry tone. Keep them where they
matter.

Examples in the legacy corpus include strings like:

- `"Lade..."`
- `"Lade Vorschau..."`
- `"Du hast %d ungelöste(s) Setup-Problem(e)..."`

### Allow localized substitutions when they improve the joke

The historic translation replaced one password example with a more locally
natural variant. This is acceptable when it preserves tone and does not break
meaning.

### Keep placeholders and formatting exact

Always preserve:

- `%s`, `%d`, positional placeholders
- HTML/remarkup expectations
- plurality and variant structure

### Always translate with module context

Do not translate Phorge strings from the PO file alone when the semantics are
ambiguous.

Many strings only become clear when viewed in the current module or call site,
for example:

- Files versus Audit versus Herald activity text
- user-facing UI text versus admin/setup text
- generic verbs such as "Create", "Open", "Host", "Edit", or "View"
- placeholder-driven sentences where grammar depends on what `%s` represents

For review and new translation work:

- inspect the current module or call site in `phorge`
- verify tone and semantics before accepting a fuzzy match
- prefer slower, context-correct translation over fast blind reuse

## Avoid

- flattening humorous text into sterile corporate German
- making every string funny even when the original is not
- overusing slang
- changing product meaning for the sake of a joke
- inventing humor inside serious warnings or security text

## Working Tone Reference

When the original is:

- plain: translate plainly
- mildly warm: translate naturally and directly
- playful: keep the playfulness
- absurd: preserve the absurdity in idiomatic German
- technical: stay technical

## Translation Workflow Recommendation

For new translation batches:

1. classify strings by tone: neutral, technical, playful, humorous, email
2. group them by module or feature area
3. inspect the current code context before translating ambiguous strings
4. translate in batches by context, not random order
5. review for tone consistency after literal correctness
6. prefer consistency with existing German wording where it is already good

## Open Editorial Rule

When uncertain between:

- literal but flat
- idiomatic and tonally faithful

prefer the idiomatic and tonally faithful version, unless the text is
high-risk, legal, security-sensitive, or deeply technical.
