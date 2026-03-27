# Curation: i18n Infrastructure

Arbeitsliste fuer technische Uebersetzungsinfrastruktur aus den historischen Forks.

## Ziel

- alte `gettext`- und Locale-Sonderwege verstehen
- entscheiden, was fuer aktuelle Phorge-/Arcanist-Staende noch gebraucht wird
- moeglichst auf nativen oder build-basierten Importpfad umstellen

## Historische Patches

### phabricator

- `patches/phabricator-legacy/0002-Empty-string-translation-is-harmful-for-gettext.patch`
- `patches/phabricator-legacy/0004-Made-translation-engine-work-again-with-german-trans.patch`
- `patches/phabricator-legacy/0010-Compiled-MO.patch`
- `patches/phabricator-legacy/0025-Removed-mo-file-from-git-since-every-recompile-is-a-.patch`
- `patches/phabricator-legacy/0026-Create-mo-directory-in-compile_mo_files-dirty-hack-i.patch`

### libphutil

- `patches/libphutil-legacy/0001-German-locale.patch`
- `patches/libphutil-legacy/0002-Made-translation-engine-work-again-with-german-trans.patch`

## Betroffene Kernstellen

- `PhabricatorGermanTranslation`
- `PhabricatorGettextTranslator`
- `PhutilGermanLocale`
- Erweiterung von `PhutilTranslation`
- Build-Skripte fuer `.po`/`.mo`

## Vorlaeufige Bewertung

- die historische `gettext`-Runtime sollte eher nicht das Zielmodell bleiben
- die eigentliche deutsche Locale bleibt wertvoll
- Build-/Importpfad ist wahrscheinlicher als eigener Runtime-Hack
- `wikimedia/phabricator-translations` ist der wichtigste Referenzpfad fuer die Neubewertung
