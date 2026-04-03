<?php

// Fuzzy-Review-Batch 001 — einzeilige Strings mit klarem Quellkontext
//
// Alle Einträge wurden anhand des Phorge-Quellcodes kontextuell geprüft.
// Viele fuzzy-Matches waren komplett falsch zugeordnet (msgmerge-Fehler).
// Quellen im Einzelnen:
//
//   AphrontApplicationConfiguration.php   — HTTPS Required, Site Not Found
//   AphrontHTTPParameterType/*.php        — API-Parameterbeschreibungen
//   AphrontMultipartPart.php              — Multipart-Parser
//   PhutilKeyValueCacheNamespace.php      — Cache-Namespace
//   PhabricatorDatabaseRef.php            — DB-Cluster-Statuslabels
//   PhabricatorElasticsearchHost.php      — Elasticsearch-Konfiguration
//   PhabricatorCustomFieldDatasource*.php — Suchfunktionen any()/none()
//   PhabricatorCustomFieldHeraldAction.php
//   Daemon-Klassen                        — Worker-Task-Aktionen und Statusmeldungen
//   PHUIDiffInlineCommentDetailView.php   — Inline-Kommentar-Aktionen
//   PHUIDiffGraphViewTestCase.php         — Diff-Graph-Test-Bezeichner
//   PhabricatorKeyboardRemarkupRule.php   — Pfeilsymbol-Namen für Remarkup
//   PHUIIconCircleView.php                — Icon-Status-Bezeichner
//   PHUITimelineEventView.php             — Timeline-Tooltips
//   ManiphestTaskGraph.php                — Aufgaben-Graph-Tooltips
//   PhabricatorMainMenuView.php           — Hauptmenü (aural labels)
//   PhabricatorMainMenuSearchView.php     — Globale Suche

return [

  // --- Infrastruktur / Routing ---
  'HTTPS Required'
    => 'HTTPS erforderlich',
  'Site Not Found'
    => 'Website nicht gefunden',

  // --- API-Parameterbeschreibungen (Conduit) ---
  'A boolean value (true or false).'
    => 'Ein boolescher Wert (true oder false).',
  'An epoch timestamp, as an integer.'
    => 'Ein Epoch-Zeitstempel als Ganzzahl.',
  'A single object PHID.'
    => 'Ein einzelnes Objekt-PHID.',

  // --- Multipart-Parser ---
  'This part is not a variable!'
    => 'Dieser Teil ist keine Variable!',

  // --- Cache-Namespace ---
  "Namespace can't contain colons."
    => 'Der Namespace darf keine Doppelpunkte enthalten.',
  'Namespace not set.'
    => 'Kein Namespace gesetzt.',
  'Cache not available.'
    => 'Cache nicht verfügbar.',

  // --- DB-Cluster-Status (PhabricatorDatabaseRef) ---
  'Invalid Credentials'
    => 'Ungültige Zugangsdaten',
  'Slow Replication'
    => 'Langsame Replikation',
  'Not Replicating'
    => 'Keine Replikation',

  // --- Elasticsearch ---
  'Elasticsearch'
    => 'Elasticsearch',
  'Index Path'
    => 'Indexpfad',
  'Elastic Version'
    => 'Elasticsearch-Version',
  'Content Sources'
    => 'Inhaltsquellen',

  // --- Suchfunktionen für Custom Fields ---
  'Browse Any'
    => 'Beliebig durchsuchen',
  'Any Value'
    => 'Beliebiger Wert',
  'Select results with any value.'
    => 'Ergebnisse mit beliebigem Wert auswählen.',
  'Browse No Value'
    => 'Ohne Wert durchsuchen',
  'No Value'
    => 'Kein Wert',
  'Set Field Value'
    => 'Feldwert setzen',

  // --- Daemon-Statusmeldungen ---
  'Memory Usage: %s KB'
    => 'Speicherverbrauch: %s KB',
  'Preparing to hibernate for %s second(s).'
    => 'Bereite Schlafzustand für %s Sekunde(n) vor.',
  'Idle for %s seconds.'
    => 'Seit %s Sekunden untätig.',
  'You must specify at least one daemon to start!'
    => 'Es muss mindestens ein Daemon zum Starten angegeben werden!',
  'Unable to fork!'
    => 'Fork nicht möglich!',

  // --- Worker-Task-Verwaltung ---
  'Bulk Update'
    => 'Massenaktualisierung',
  'Worker Tasks'
    => 'Worker-Aufgaben',
  'No tasks selected to cancel.'
    => 'Keine Aufgaben zum Abbrechen ausgewählt.',
  'Cancelled %s task(s).'
    => '%s Aufgabe(n) abgebrochen.',
  'No tasks selected to delay.'
    => 'Keine Aufgaben zum Verzögern ausgewählt.',
  'Delayed %s task(s).'
    => '%s Aufgabe(n) verzögert.',
  'No tasks selected to execute.'
    => 'Keine Aufgaben zum Ausführen ausgewählt.',
  'Executing %s...'
    => 'Führe %s aus...',
  'Executed %s task(s).'
    => '%s Aufgabe(n) ausgeführt.',
  'No tasks selected to free leases on.'
    => 'Keine Aufgaben zum Freigeben von Leases ausgewählt.',
  'Priority must be a positive integer.'
    => 'Die Priorität muss eine positive Ganzzahl sein.',
  'No tasks selected to reprioritize.'
    => 'Keine Aufgaben zur Neuprioritisierung ausgewählt.',
  'Reprioritized %s task(s).'
    => '%s Aufgabe(n) neu priorisiert.',
  'No tasks selected to retry.'
    => 'Keine Aufgaben zum erneuten Ausführen ausgewählt.',
  'Queued %s task(s) for retry.'
    => '%s Aufgabe(n) zum erneuten Ausführen eingereiht.',
  'Select active tasks.'
    => 'Aktive Aufgaben auswählen.',
  'Select archived tasks.'
    => 'Archivierte Aufgaben auswählen.',
  'Select tasks with a minimum priority.'
    => 'Aufgaben mit Mindestpriorität auswählen.',
  'Select tasks with a maximum priority.'
    => 'Aufgaben mit Höchstpriorität auswählen.',
  'Only the author of a bulk job can edit it.'
    => 'Nur der Autor eines Massenauftrags kann diesen bearbeiten.',

  // --- Diff / Inline-Kommentare ---
  'Remove Paragraph'
    => 'Absatz entfernen',
  'Diff with a removed comma.'
    => 'Diff mit entferntem Komma.',
  'Collapse'
    => 'Einklappen',
  'Expand'
    => 'Ausklappen',
  'Reply to Comment'
    => 'Auf Kommentar antworten',
  'Quote Comment'
    => 'Kommentar zitieren',
  'Delete Comment'
    => 'Kommentar löschen',
  'Inline Actions'
    => 'Inline-Aktionen',
  'Changes discarded.'
    => 'Änderungen verworfen.',

  // --- Diff-Graph-Tests (Testbezeichner) ---
  'Terminating Tree'
    => 'Terminierender Baum',
  'Reverse Tree'
    => 'Umgekehrter Baum',
  'Terminated Tree'
    => 'Terminierter Baum',

  // --- Repository ---
  'Repository Short Name'
    => 'Repository-Kurzname',
  'Repository Callsign'
    => 'Repository-Callsign',
  'Exporting Data...'
    => 'Exportiere Daten...',
  'Export Format'
    => 'Exportformat',

  // --- PHID / Spaces ---
  'Space PHID'
    => 'Spaces-PHID',
  'Subscriber PHIDs'
    => 'Abonnenten-PHIDs',

  // --- Maniphest-Aufgaben-Graph ---
  'Direct Parent'
    => 'Direkter Elterntask',
  'Direct Subtask'
    => 'Direkter Untertask',

  // --- Dateisystem ---
  'Found %s modified file(s) (of %s total).'
    => '%s geänderte Datei(en) gefunden (von %s insgesamt).',
  'Opening %s failed! %s.'
    => 'Das Öffnen von %s ist fehlgeschlagen! %s.',

  // --- Diverses ---
  'Uninstalled Documentation'
    => 'Nicht installierte Dokumentation',
  'Modular Transactions Linter'
    => 'Modularer Transaktions-Linter',
  'Operator extension not available.'
    => 'Operatorerweiterung nicht verfügbar.',

  // --- Remarkup-Pfeilsymbol-Namen ---
  // (Keyboard-Remarkup: Namen der Pfeil-Symbole für die Dokumentation)
  'Tab'
    => 'Tab',
  'Down'
    => 'Unten',
  'Up Right'
    => 'Rechts oben',
  'Down Right'
    => 'Rechts unten',
  'Down Left'
    => 'Links unten',
  'Up Left'
    => 'Links oben',
  'Simple'
    => 'Einfach',

  // --- Suche / Sortierung ---
  'Relevance'
    => 'Relevanz',
  '#%d: %s'
    => '#%d: %s',
  '%s Query: %s'
    => '%s-Abfrage: %s',

  // --- Datenbank-Verwaltung ---
  'List databases.'
    => 'Datenbanken auflisten.',
  'Compacted table by %s in %sms.'
    => 'Tabelle in %sms um %s komprimiert.',
  'Invalid database escaper.'
    => 'Ungültige Datenbank-Escape-Funktion.',
  "Set a '%s' in your configuration!"
    => "Setze '%s' in der Konfiguration!",
  'Metronome frequency must be an integer.'
    => 'Die Metronom-Frequenz muss eine Ganzzahl sein.',
  'Clear Connection Pool'
    => 'Verbindungspool leeren',
  'Offset for: %s'
    => 'Offset für: %s',

  // --- Monatsnamen (fehlende Einträge) ---
  'March'
    => 'März',
  'September'
    => 'September',
  'November'
    => 'November',
  'December'
    => 'Dezember',

  // --- Richtlinien / Projekte ---
  'Other Named Policy...'
    => 'Andere benannte Richtlinie...',
  'Other Project...'
    => 'Anderes Projekt...',

  // --- Kopieren / Zwischenablage ---
  'Copy %s'
    => 'Kopie von %s',
  '%s copied.'
    => '%s kopiert.',
  'Copy text'
    => 'Text kopieren',
  'Text copied.'
    => 'Text kopiert.',

  // --- Hauptmenü-Suche ---
  'Find User:'
    => 'Benutzer suchen:',
  'Find Project:'
    => 'Projekt suchen:',
  'Find Document:'
    => 'Dokument suchen:',
  'See Documentation'
    => 'Dokumentation anzeigen',
  'Saved Global Queries'
    => 'Gespeicherte globale Abfragen',
  'Configure Global Search'
    => 'Globale Suche konfigurieren',
  'Page Menu'
    => 'Seitenmenü',

  // --- Menü / Navigation ---
  'Chat Messages'
    => 'Chat-Nachrichten',
  '%s unresolved issues.'
    => '%s ungelöste Probleme.',
  'Read more...'
    => 'Weiter...',
  'View All Results'
    => 'Alle Ergebnisse anzeigen',
  'View More...'
    => 'Mehr anzeigen...',

  // --- Icon-Status-Bezeichner (PHUIIconCircleView) ---
  'Failure'
    => 'Fehler',
  'Minus'
    => 'Minus',

  // --- Timeline-Tooltips ---
  'MFA Authenticated'
    => 'MFA-Authentifiziert',
  'Lock Overridden'
    => 'Sperre überschrieben',

  // --- Änderungshistorie ---
  'Show Older Changes'
    => 'Ältere Änderungen anzeigen',
  'No visible events.'
    => 'Keine sichtbaren Ereignisse.',

];
