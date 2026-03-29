# Agent Instructions

Repository-specific working rules for coding agents.

## Purpose

- this repository is for curated local patches, translation work, and migration
  helpers
- it is not an upstream tree
- however, parts of the work here may later be ported into `phorge` or
  `phorge-arcanist`

## Commit Message Rules

- for the active migration project in this repository, internal task
  references like `T1369` are expected in commit messages
- prefer the `Ref T1369 ...` style for normal curation and translation commits
- if a branch or patch is being prepared for later upstream submission, rewrite
  the commit messages to neutral wording without internal task IDs
- target repositories that may later receive ports from here, especially
  `phorge` and `phorge-arcanist`, should avoid internal task references in
  commit messages

## Patch Curation

- keep patches small and thematic
- prefer wording and structure that will be easy to port or split later
- document upstream-friendly candidates separately from local-only work

## Boundaries

- deployment and operational knowledge belongs in `phorge-intern`, not here
- do not assume files in this repository map 1:1 to upstream submission units
