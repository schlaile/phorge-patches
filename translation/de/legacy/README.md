# Legacy German Translation Sources

This directory contains the historic German translation files copied from the
old local repositories.

## Files

- `phabricator-de.po`
  Large historic German translation corpus from the old local `phabricator`
  fork.

- `libphutil-de.po`
  Historic German locale-related translation file from the old local
  `libphutil` fork.

## Notes

- These files are preserved as source material.
- They should not be replayed patch-by-patch.
- The intended path is consolidation, cleanup, and remapping against current
  Phorge and Arcanist string inventories.
- `phabricator-de.po` has been restored to the historic source state after the
  first `msgmerge` experiment updated it in place.
