<?php

// Remaining project strings — mostly unit test fixtures and policy assertions.

return [

  // "Add project tags" (label, no period) — distinct from "Add project tags."
  'Add project tags'   => 'Projekt-Tags hinzufügen',
  'Test Project for %s'=> 'Testprojekt für %s',
  'Test Project %d'    => 'Testprojekt %d',
  'Test Task'          => 'Testaufgabe',
  'Unit Test User %d'  => 'Testbenutzer %d',

  // Sci-fi test project names (used in policy unit tests)
  'Warp to New Planet'    => 'Zu neuem Planeten warpen',
  'All Scan'              => 'Alle Scan',
  'Engineering Only'      => 'Nur Engineering',
  'Exploration Only'      => 'Nur Exploration',
  'Scan Diplomat'         => 'Scan-Diplomat',
  'Diplomatic Meeting'    => 'Diplomatisches Treffen',
  'Scan Warp Drives'      => 'Warpantriebe scannen',
  'All Engineering'       => 'Gesamte Engineering',
  'Engineering + Exploration' => 'Engineering + Exploration',
  'Engineering + Scan'    => 'Engineering + Scan',

  // Workboard move test labels
  'Simple move'           => 'Einfacher Schritt',
  'With afterPHIDs'       => 'Mit afterPHIDs',
  'With beforePHIDs'      => 'Mit beforePHIDs',

  // Test assertion strings
  'Arbitrary user not member of project.'     => 'Beliebiger Benutzer ist kein Mitglied des Projektes.',
  'Join works.'                               => 'Beitreten funktioniert.',
  'Joining an already-joined project is a no-op.' => 'Erneutes Beitreten eines Projektes hat keine Wirkung.',
  'Leave works.'                              => 'Verlassen funktioniert.',
  'Leaving an already-left project is a no-op.' => 'Erneutes Verlassen eines Projektes hat keine Wirkung.',
  'Join allowed with edit permission.'        => 'Beitreten mit Bearbeitungsberechtigung erlaubt.',
  'Join allowed with join permission.'        => 'Beitreten mit Beitrittsberechtigung erlaubt.',
  'Leave allowed without any permission.'     => 'Verlassen ohne besondere Berechtigung erlaubt.',
  'Test users cannot join project A, because B exists'
    => 'Testbenutzer können Projekt A nicht beitreten, weil B existiert',
  'Test users cannot join project B, because C exists'
    => 'Testbenutzer können Projekt B nicht beitreten, weil C existiert',
  'Test users cannot join project A, because C exists'
    => 'Testbenutzer können Projekt A nicht beitreten, weil C existiert',

  // Policy rule test labels
  'Project policy rule; user in no projects'  => 'Projektrichtlinienregel; Benutzer in keinem Projekt',
  'Project policy rule; user in some projects'=> 'Projektrichtlinienregel; Benutzer in einigen Projekten',
  'Project policy rule; user in all projects' => 'Projektrichtlinienregel; Benutzer in allen Projekten',

];
