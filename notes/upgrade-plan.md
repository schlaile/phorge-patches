# Upgrade Plan

Short version of the planned migration path:

1. clone the old production state into a lab environment
2. extract historic local changes from the old forks
3. set up a clean final Phacility baseline
4. curate and validate local patches there
5. rebuild the translation path around a native or build-based import flow
6. split branding into an overlay
7. then move forward to `phorge` and `phorge-arcanist`

Operational details live in `phorge-intern`.

## Current Workstreams

- [curation-files-and-calendar.md](/home/peter/phorge-patches/notes/curation-files-and-calendar.md)
- [curation-i18n-content.md](/home/peter/phorge-patches/notes/curation-i18n-content.md)
- [curation-i18n-infra.md](/home/peter/phorge-patches/notes/curation-i18n-infra.md)
