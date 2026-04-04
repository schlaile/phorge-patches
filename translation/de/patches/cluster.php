<?php
// Translation patches for infrastructure/cluster
// German (de)

return [

  // --- Search cluster config (PhabricatorClusterSearchConfigType) ---

  'Search cluster configuration is not valid: each entry in the list must be a dictionary describing a search service, but the value with index "%s" is not a dictionary.'
    => 'Die Suchcluster-Konfiguration ist ungültig: Jeder Eintrag in der Liste muss eine Zuordnung sein, die einen Suchdienst beschreibt, aber der Wert mit Index „%s" ist keine Zuordnung.',

  'Search engine configuration has an invalid service specification (at index "%s"): %s.'
    => 'Die Suchmaschinen-Konfiguration enthält eine ungültige Dienstangabe (an Index „%s"): %s.',

  'Invalid search engine type: %s. Valid types are: %s.'
    => 'Ungültiger Suchmaschinentyp: %s. Gültige Typen sind: %s.',

  'Search cluster configuration has an invalid host specification (at index "%s"): %s.'
    => 'Die Suchcluster-Konfiguration enthält eine ungültige Host-Angabe (an Index „%s"): %s.',

  // --- Mailer cluster config (PhabricatorClusterMailersConfigType) ---

  'Mailer cluster configuration is not valid: it should be a list of mailer configurations.'
    => 'Die Mailer-Cluster-Konfiguration ist ungültig: Sie muss eine Liste von Mailer-Konfigurationen sein.',

  'Mailer cluster configuration is not valid: each entry in the list must be a dictionary describing a mailer, but the value with index "%s" is not a dictionary.'
    => 'Die Mailer-Cluster-Konfiguration ist ungültig: Jeder Eintrag in der Liste muss eine Zuordnung sein, die einen Mailer beschreibt, aber der Wert mit Index „%s" ist keine Zuordnung.',

  'Mailer configuration has an invalid mailer specification (at index "%s"): %s.'
    => 'Die Mailer-Konfiguration enthält eine ungültige Mailer-Angabe (an Index „%s"): %s.',

  'Mailer configuration is invalid: multiple mailers have the same key ("%s"). Each mailer must have a unique key.'
    => 'Die Mailer-Konfiguration ist ungültig: Mehrere Mailer haben denselben Schlüssel („%s"). Jeder Mailer muss einen eindeutigen Schlüssel haben.',

  'Mailer configuration ("%s") is invalid: priority must be greater than 0.'
    => 'Mailer-Konfiguration („%s") ist ungültig: Die Priorität muss größer als 0 sein.',

  'Mailer configuration ("%s") is invalid: mailer type ("%s") is unknown. Supported mailer types are: %s.'
    => 'Mailer-Konfiguration („%s") ist ungültig: Mailer-Typ „%s" ist unbekannt. Unterstützte Mailer-Typen sind: %s.',

  'Mailer configuration ("%s") specifies invalid options for mailer: %s'
    => 'Mailer-Konfiguration („%s") enthält ungültige Optionen für den Mailer: %s',

  // --- Database cluster config (PhabricatorClusterDatabasesConfigType) ---

  'Database cluster configuration is not valid: each entry in the list must be a dictionary describing a database host, but the value with index "%s" is not a dictionary.'
    => 'Die Datenbankcluster-Konfiguration ist ungültig: Jeder Eintrag in der Liste muss eine Zuordnung sein, die einen Datenbankhost beschreibt, aber der Wert mit Index „%s" ist keine Zuordnung.',

  'Database cluster configuration has an invalid host specification (at index "%s"): %s.'
    => 'Die Datenbankcluster-Konfiguration enthält eine ungültige Host-Angabe (an Index „%s"): %s.',

  'Database cluster configuration describes an invalid host ("%s", at index "%s") with an unrecognized role ("%s"). Valid roles are "%s" or "%s".'
    => 'Die Datenbankcluster-Konfiguration beschreibt einen ungültigen Host („%s", an Index „%s") mit unbekannter Rolle „%s". Gültige Rollen sind „%s" oder „%s".',

  'Database cluster configuration is invalid: it describes the same host ("%s") multiple times. Each host should appear only once in the list.'
    => 'Die Datenbankcluster-Konfiguration ist ungültig: Host „%s" wird mehrfach aufgeführt. Jeder Host darf nur einmal in der Liste erscheinen.',

  // --- PhabricatorDatabaseRefParser — partition/replica validation ---

  'This server is configured with multiple master databases, but master "%s" is missing a "partition" configuration key to define application partitioning.'
    => 'Dieser Server ist mit mehreren Master-Datenbanken konfiguriert, aber Master „%s" hat keinen Konfigurationsschlüssel „partition" zur Festlegung der Anwendungspartitionierung.',

  'Multiple masters (databases "%s" and "%s") specify that they are the "default" partition. Only one master may be the default.'
    => 'Mehrere Master (Datenbanken „%s" und „%s") geben an, die „default"-Partition zu sein. Nur ein Master darf der Standard sein.',

  'Multiple masters (databases "%s" and "%s") specify that they are the partition for application "%s". Each application may be allocated to only one partition.'
    => 'Mehrere Master (Datenbanken „%s" und „%s") geben an, die Partition für Anwendung „%s" zu sein. Jede Anwendung darf nur einer Partition zugeordnet werden.',

  'Multiple configured databases have the same internal key, "%s". You may have listed a database multiple times.'
    => 'Mehrere konfigurierte Datenbanken haben denselben internen Schlüssel „%s". Möglicherweise wurde eine Datenbank mehrfach aufgeführt.',

  'Database "%s" is configured as a replica, but specifies a "partition". Only master databases may have a partition configuration. Replicas use the same configuration as the master they follow.'
    => 'Datenbank „%s" ist als Replica konfiguriert, gibt aber eine „partition" an. Nur Master-Datenbanken dürfen eine Partitionskonfiguration haben. Replicas verwenden dieselbe Konfiguration wie ihr jeweiliger Master.',

  'Database "%s" is configured as a replica, but does not specify which "master" it follows in configuration. Valid masters are: %s.'
    => 'Datenbank „%s" ist als Replica konfiguriert, gibt aber keinen „master" an, dem sie folgt. Gültige Master sind: %s.',

  'Database "%s" is configured as a replica, but there is no master configured.'
    => 'Datenbank „%s" ist als Replica konfiguriert, aber es ist kein Master konfiguriert.',

  'Database "%s" is configured as a replica and specifies a master ("%s"), but that master is not a valid master. Valid masters are: %s.'
    => 'Datenbank „%s" ist als Replica konfiguriert und gibt Master „%s" an, aber dieser ist kein gültiger Master. Gültige Master sind: %s.',

  // --- PhabricatorSearchService ---

  'Configured search engine type "%s" is unknown. Valid engines are: %s.'
    => 'Konfigurierter Suchmaschinentyp „%s" ist unbekannt. Gültige Engines sind: %s.',

  'Writes to search services failed while reindexing document "%s".'
    => 'Schreibzugriffe auf Suchdienste sind beim Neu-Indizieren von Dokument „%s" fehlgeschlagen.',

  'All of the configured Fulltext Search services failed.'
    => 'Alle konfigurierten Volltextsuche-Dienste sind ausgefallen.',

  // --- Exception titles (PhabricatorCluster*Exception) ---

  'Unable to Reach Any Database'
    => 'Keine Datenbank erreichbar',

  'Impossible Cluster Write'
    => 'Unmöglicher Cluster-Schreibzugriff',

  'Search cluster has no hosts for role "%s".'
    => 'Der Suchcluster hat keine Hosts für Rolle „%s".',

  'Improper Cluster Write'
    => 'Unzulässiger Cluster-Schreibzugriff',

  // --- PhabricatorClusterExceptionHandler ---

  'Handles runtime problems with cluster configuration.'
    => 'Behandelt Laufzeitprobleme mit der Cluster-Konfiguration.',

  'Proceed With Caution'
    => 'Mit Vorsicht fortfahren',

  // --- PhabricatorDatabaseRef — replica health checks ---

  'No permission to run "SHOW REPLICA STATUS". Grant this user "REPLICATION CLIENT" permission to allow this server to monitor replica health.'
    => 'Keine Berechtigung, „SHOW REPLICA STATUS" auszuführen. Erteile diesem Benutzer die Berechtigung „REPLICATION CLIENT", damit der Server den Replica-Status überwachen kann.',

  'This host has a "master" role, but is replicating data from another host ("%s")!'
    => 'Dieser Host hat die Rolle „master", repliziert aber Daten von einem anderen Host („%s")!',

  'This host has a "replica" role, but is not replicating data from a master (no output from "SHOW REPLICA STATUS").'
    => 'Dieser Host hat die Rolle „replica", repliziert aber keine Daten von einem Master (keine Ausgabe von „SHOW REPLICA STATUS").',

  'This replica is lagging far behind the master. Data is at risk!'
    => 'Diese Replica liegt weit hinter dem Master zurück. Datenverlust droht!',

];
