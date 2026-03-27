# phorge-patches

Kuratiertes Arbeitsrepo fuer lokale Phorge-/Arcanist-Anpassungen.

Dieses Repo enthaelt keine kompletten Fremd-Repositories, sondern nur:

- Patchserien gegen `phorge` und `phorge-arcanist`
- Migrationshilfen fuer historische `phabricator`-/`libphutil`-Aenderungen
- Uebersetzungsdaten und Import-/Build-Notizen
- Branding-Overlays
- technische Inventare und Upstream-Kandidaten

## Ziel

Lokale Anpassungen so pflegen, dass sie:

- moeglichst klein und wartbar bleiben
- soweit sinnvoll upstream-faehig sind
- nicht unnoetig mit Betriebswissen oder Deployment vermischt werden

## Struktur

- `patches/phorge/`: kuratierte Patches gegen `phorge`
- `patches/arcanist/`: kuratierte Patches gegen `phorge-arcanist`
- `patches/libphutil-legacy/`: historische Patches aus dem alten `libphutil`
- `translation/de/`: deutsche Uebersetzungsdaten
- `translation/import/`: Notizen und Hilfen fuer Import-/Build-Pfade
- `translation/wikimedia/`: Auswertung des Wikimedia-Importpfads
- `branding/phabricator/`: internes Branding-Overlay fuer weiter sichtbares "Phabricator"
- `branding/assets/`: nicht-sensitive Branding-Artefakte
- `notes/`: Inventare, Upgrade-Plan, Upstream-Kandidaten
- `scripts/`: Hilfsskripte fuer Export, Anwendung und Build

## Arbeitsweise

1. Historische Aenderungen aus den alten Repositories inventarisieren.
2. Aenderungen in Tracks aufteilen: `feature`, `i18n-content`, `i18n-infra`, `branding`.
3. Patches thematisch klein halten.
4. Upstream-faehige Aenderungen separat dokumentieren.
5. Betriebs- und Umgebungswissen ausschliesslich in `phorge-intern` pflegen.

## Bezug zu den anderen Repositories

- `phorge`: Ziel-Fork fuer Server/Kern
- `phorge-arcanist`: Ziel-Fork fuer Arcanist inklusive integrierter ehemaliger `libphutil`-Anteile
- `phorge-intern`: private Betriebs-, Migrations- und Rollout-Dokumentation
