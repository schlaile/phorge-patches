# Curation: i18n Infrastructure

Working list for technical translation infrastructure from the historic forks.

## Goal

- understand the old `gettext` and locale-specific paths
- decide what is still needed for current Phorge and Arcanist states
- move, if possible, to a native or build-based import path

## Historic Patches

### phabricator

- `patches/phabricator-legacy/0002-Empty-string-translation-is-harmful-for-gettext.patch`
- `patches/phabricator-legacy/0004-Made-translation-engine-work-again-with-german-trans.patch`
- `patches/phabricator-legacy/0010-Compiled-MO.patch`
- `patches/phabricator-legacy/0025-Removed-mo-file-from-git-since-every-recompile-is-a-.patch`
- `patches/phabricator-legacy/0026-Create-mo-directory-in-compile_mo_files-dirty-hack-i.patch`

### libphutil

- `patches/libphutil-legacy/0001-German-locale.patch`
- `patches/libphutil-legacy/0002-Made-translation-engine-work-again-with-german-trans.patch`

## Affected Core Areas

- `PhabricatorGermanTranslation`
- `PhabricatorGettextTranslator`
- `PhutilGermanLocale`
- extension of `PhutilTranslation`
- build scripts for `.po` and `.mo`

## Preliminary Assessment

- the historic `gettext` runtime should probably not remain the target model
- the actual German locale support remains valuable
- a build/import path is more likely than a custom runtime hack
- `wikimedia/phabricator-translations` is the main reference path for reevaluation
