# Agent Instructions

Repository-specific working rules for coding agents.

## Purpose

- this repository is for curated local patches, translation work, and migration
  helpers
- it is not an upstream tree
- however, parts of the work here may later be ported into `phorge` or
  `phorge-arcanist`

## Repository Roles

- active upstream-facing server/core work happens in `phorge`
- active upstream-facing Arcanist/libphutil-derived work happens in
  `phorge-arcanist`
- `phorge-intern` holds private rollout, migration, and operations notes
- legacy working trees like old `phabricator` or standalone `libphutil` are
  reference material only unless the user explicitly says otherwise
- do not treat exploratory fixes in standalone `libphutil` as upstream patch
  candidates for current work; check `phorge-arcanist` first

## Translation Format

- PO files in this repository are the main human editing format, but not the
  final runtime format
- translation work may use a repository-local PO extension for rare native
  variant-array cases: `I18N-ARRAY`
- before editing translation files, read
  [translation/FORMAT.md](translation/FORMAT.md)
- do not invent alternative escape syntaxes in PO files

## Commit Message Rules

- write commit messages in English
- the active migration project in this repository is tracked in `T1369`
- the PHP 8 compatibility subtask is tracked in `T1371`
- for the active migration project in this repository, internal task
  references like `T1369` are expected in commit messages
- prefer the `Ref T1369 ...` style for normal curation and translation commits
- for PHP 8 compatibility notes, tooling, and exported patch work, prefer the
  `Ref T1371 ...` style
- if a branch or patch is being prepared for later upstream submission, rewrite
  the commit messages to neutral wording without internal task IDs
- target repositories that may later receive ports from here, especially
  `phorge` and `phorge-arcanist`, should avoid internal task references in
  commit messages

## Patch Curation

- keep patches small and thematic
- document PHP 8 compatibility work against `T1371` in notes and exported
  patch series
- remove or downgrade exploratory patches if the real fix location turns out to
  be `phorge` or `phorge-arcanist` instead
- prefer wording and structure that will be easy to port or split later
- document upstream-friendly candidates separately from local-only work

## Boundaries

- deployment and operational knowledge belongs in `phorge-intern`, not here
- do not assume files in this repository map 1:1 to upstream submission units
