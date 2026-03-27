# phorge-patches

Curated working repository for local Phorge and Arcanist changes.

This repository does not contain full upstream trees. It only contains:

- patch series against `phorge` and `phorge-arcanist`
- migration helpers for historic `phabricator` and `libphutil` changes
- translation data and import/build notes
- branding overlays
- technical inventories and upstream candidates

## Goal

Maintain local changes in a way that keeps them:

- small and maintainable
- upstream-friendly where practical
- separate from deployment and internal operations knowledge

## Structure

- `patches/phorge/`: curated patches against `phorge`
- `patches/arcanist/`: curated patches against `phorge-arcanist`
- `patches/libphutil-legacy/`: historic patches from the old `libphutil`
- `translation/de/`: German translation data
- `translation/import/`: notes and helpers for import/build paths
- `translation/wikimedia/`: evaluation of the Wikimedia import path
- `branding/phabricator/`: internal branding overlay for keeping visible "Phabricator" naming
- `branding/assets/`: non-sensitive branding artifacts
- `notes/`: inventories, upgrade plan, upstream candidates
- `scripts/`: helper scripts for export, apply, and build steps

## Workflow

1. Inventory historic changes from the old repositories.
2. Split changes into tracks: `feature`, `i18n-content`, `i18n-infra`, `branding`.
3. Keep patches small and thematic.
4. Document upstream-friendly changes separately.
5. Keep deployment and environment knowledge in `phorge-intern` only.

## Commit Message Rule

- Internal task references like `T1369` are acceptable in this repository.
- Target repositories that may later be proposed upstream, such as `phorge` or `phorge-arcanist`, should avoid internal task references in commit messages.
- For upstream submission branches, use neutral commit messages without internal ticket IDs.

## Relationship To Other Repositories

- `phorge`: target fork for server/core work
- `phorge-arcanist`: target fork for Arcanist, including later ports of former `libphutil` functionality
- `phorge-intern`: private operations, migration, and rollout documentation
