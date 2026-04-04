<?php
// Translation patches for infrastructure/env
// German (de)

return [

  // PhabricatorConfigSource — write guard
  'This configuration source does not support writes.'
    => 'Diese Konfigurationsquelle unterstützt keine Schreibzugriffe.',

  // PhabricatorConfigProxySource — missing source
  'No configuration source set!'
    => 'Keine Konfigurationsquelle gesetzt!',

  // PhabricatorConfigStackSource — stack underflow (developer error)
  'Popping an empty %s!'
    => '%s: Stack ist leer.',

  // PhabricatorConfigLocalSource — file read errors
  'Configuration file "%s" exists, but could not be read.'
    => 'Konfigurationsdatei „%s" ist vorhanden, konnte aber nicht gelesen werden.',

  'Configuration file "%s" exists and is readable, but the content is not valid JSON. You may have edited this file manually and introduced a syntax error by mistake. Correct the file syntax to continue.'
    => 'Konfigurationsdatei „%s" ist vorhanden und lesbar, aber der Inhalt ist kein gültiges JSON. Möglicherweise wurde die Datei manuell bearbeitet und dabei versehentlich ein Syntaxfehler eingeführt. Behebe den Syntaxfehler, um fortzufahren.',

  // PhabricatorEnv::getEnvConfig — initialization guard
  'Trying to read configuration "%s" before configuration has been initialized.'
    => 'Versuch, Konfiguration „%s" zu lesen, bevor die Konfiguration initialisiert wurde.',

  // PhabricatorEnv::getEnvConfig — missing key
  "No config value specified for key '%s'."
    => 'Kein Konfigurationswert für Schlüssel „%s" angegeben.',

  // PhabricatorEnv::getAnyBaseURI — missing base URI
  "Define '%s' in your configuration to continue."
    => '„%s" muss in der Konfiguration festgelegt sein, um fortzufahren.',

  // PhabricatorEnv::getReadOnlyMessage — read-only mode reasons
  'This server is in read-only mode (no writable database is configured).'
    => 'Dieser Server befindet sich im Nur-Lese-Modus (keine beschreibbare Datenbank konfiguriert).',

  'This server is in read-only mode (unreachable master).'
    => 'Dieser Server befindet sich im Nur-Lese-Modus (Master nicht erreichbar).',

  'This server is in read-only mode (major interruption).'
    => 'Dieser Server befindet sich im Nur-Lese-Modus (schwerwiegende Unterbrechung).',

  'This server is in read-only mode.'
    => 'Dieser Server befindet sich im Nur-Lese-Modus.',

  // PhabricatorEnv::popTestEnvironment — stack order violation (developer error)
  'Scoped environments were destroyed in a different order than they were initialized.'
    => 'Scoped Environments wurden in anderer Reihenfolge beendet als initialisiert.',

  // PhabricatorEnv::requireValidRemoteURIForLink — linkable URI validation
  'URI "%s" is not a valid linkable resource. A valid linkable resource URI must specify a protocol.'
    => 'URI „%s" ist keine gültige verlinkbare Ressource. Eine gültige verlinkbare Ressource muss ein Protokoll angeben.',

  'URI "%s" is not a valid linkable resource. A valid linkable resource URI must use one of these protocols: %s.'
    => 'URI „%s" ist keine gültige verlinkbare Ressource. Eine gültige verlinkbare Ressource muss eines dieser Protokolle verwenden: %s.',

  'URI "%s" is not a valid linkable resource. A valid linkable resource URI must specify a domain.'
    => 'URI „%s" ist keine gültige verlinkbare Ressource. Eine gültige verlinkbare Ressource muss eine Domain angeben.',

  // PhabricatorEnv::requireValidRemoteURIForFetch — fetchable URI validation
  'URI "%s" is not a valid fetchable resource. A valid fetchable resource URI must specify a protocol.'
    => 'URI „%s" ist keine gültige abrufbare Ressource. Eine gültige abrufbare Ressource muss ein Protokoll angeben.',

  'URI "%s" is not a valid fetchable resource. A valid fetchable resource URI must use one of these protocols: %s.'
    => 'URI „%s" ist keine gültige abrufbare Ressource. Eine gültige abrufbare Ressource muss eines dieser Protokolle verwenden: %s.',

  'URI "%s" is not a valid fetchable resource. A valid fetchable resource URI must specify a domain.'
    => 'URI „%s" ist keine gültige abrufbare Ressource. Eine gültige abrufbare Ressource muss eine Domain angeben.',

  'URI "%s" is not a valid fetchable resource. The domain "%s" could not be resolved.'
    => 'URI „%s" ist keine gültige abrufbare Ressource. Die Domain „%s" konnte nicht aufgelöst werden.',

  'URI "%s" is not a valid fetchable resource. The domain "%s" resolves to the address "%s", which is blacklisted for outbound requests.'
    => 'URI „%s" ist keine gültige abrufbare Ressource. Die Domain „%s" löst zur Adresse „%s" auf, die für ausgehende Anfragen gesperrt ist.',

  // PhabricatorEnv::isClusterRemoteAddress — cluster whitelist check
  'Unable to test remote address against cluster whitelist: REMOTE_ADDR is not defined or not valid.'
    => 'Remote-Adresse kann nicht gegen die Cluster-Whitelist geprüft werden: REMOTE_ADDR ist nicht definiert oder ungültig.',

  'This server is not configured to serve cluster requests. Set `cluster.addresses` in the configuration to whitelist cluster hosts before sending requests that use a cluster authentication mechanism.'
    => 'Dieser Server ist nicht für Cluster-Anfragen konfiguriert. Lege `cluster.addresses` in der Konfiguration fest, um Cluster-Hosts in der Whitelist einzutragen, bevor Anfragen mit einem Cluster-Authentifizierungsmechanismus gesendet werden.',

  // PhabricatorEnvTestCase — test assertion labels
  'Valid local resource: %s'
    => 'Gültige lokale Ressource: %s',

  'Valid linkable remote URI: %s'
    => 'Gültige verlinkbare Remote-URI: %s',

  'Valid fetchable remote URI: %s'
    => 'Gültige abrufbare Remote-URI: %s',

  'Destroying a scoped environment which is not on the top of the stack should throw.'
    => 'Das Beenden eines Scoped Environment außerhalb der Stack-Spitze muss eine Exception auslösen.',

  'Is self URI? %s'
    => 'Eigene URI? %s',

];
