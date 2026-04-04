<?php
// Translation patches for infrastructure/util
// German (de)

return [

  // --- PhabricatorGlobalLock — lock parameter validation ---

  'Lock parameter key "%s" must be alphanumeric.'
    => 'Lock-Parameter-Schlüssel „%s" darf nur alphanumerische Zeichen enthalten.',

  'Lock parameter for key "%s" must be a scalar.'
    => 'Lock-Parameter für Schlüssel „%s" muss ein Skalar sein.',

  // --- PhabricatorGlobalLock — connection/lock guards ---

  'Lock is already held, and must be released before the connection may be changed.'
    => 'Lock wird bereits gehalten und muss freigegeben werden, bevor die Verbindung geändert werden kann.',

  'Unable to establish lock on connection: this connection is already holding a lock. Acquiring a second lock on the same connection would release the first lock in MySQL versions older than 5.7.'
    => 'Lock kann auf dieser Verbindung nicht erworben werden: Die Verbindung hält bereits einen Lock. Das Erwerben eines zweiten Locks auf derselben Verbindung würde den ersten Lock in MySQL-Versionen älter als 5.7 freigeben.',

  // --- PhabricatorGlobalLock — lock hints ---

  'Enable the lock log for more detailed information about which process is holding this lock.'
    => 'Aktiviere das Lock-Log für detailliertere Informationen darüber, welcher Prozess diesen Lock hält.',

  'During the last %s second(s) spent waiting for the lock, more than %s other process(es) acquired it, so this is likely a bottleneck. Use "bin/lock log --name %s" to review log activity.'
    => 'In den letzten %s Sekunde(n) Wartezeit auf den Lock haben mehr als %s andere Prozess(e) ihn erworben – das deutet auf einen Engpass hin. Verwende „bin/lock log --name %s", um die Log-Aktivität zu prüfen.',

  'During the last %s second(s) spent waiting for the lock, %s other process(es) acquired it, so this is likely a bottleneck. Use "bin/lock log --name %s" to review log activity.'
    => 'In den letzten %s Sekunde(n) Wartezeit auf den Lock haben %s andere Prozess(e) ihn erworben – das deutet auf einen Engpass hin. Verwende „bin/lock log --name %s", um die Log-Aktivität zu prüfen.',

  'This lock was most recently acquired by a process (%s) %s second(s) ago.'
    => 'Dieser Lock wurde zuletzt von einem Prozess (%s) vor %s Sekunde(n) erworben.',

  'This lock was released %s second(s) ago.'
    => 'Dieser Lock wurde vor %s Sekunde(n) freigegeben.',

  'There is no record of this lock being released.'
    => 'Es gibt keinen Eintrag über die Freigabe dieses Locks.',

  'Found no records of processes acquiring or releasing this lock.'
    => 'Keine Einträge über Prozesse gefunden, die diesen Lock erworben oder freigegeben haben.',

  // --- PhabricatorMetronome — parameter validation ---

  'Metronome offset must be an integer.'
    => 'Metronom-Versatz muss eine ganze Zahl sein.',

  'Metronome offset must be 0 or more.'
    => 'Metronom-Versatz muss 0 oder größer sein.',

  'Metronome frequency must be 1 or more.'
    => 'Metronom-Frequenz muss 1 oder größer sein.',

  'Maximum tick window must not be smaller than minimum tick window.'
    => 'Das maximale Taktfenster darf nicht kleiner als das minimale Taktfenster sein.',

  // --- PhabricatorBcryptPasswordHasher ---

  'bcrypt'
    => 'bcrypt',

  'To use BCrypt, make the password_hash() function available.'
    => 'Um BCrypt zu verwenden, muss die Funktion password_hash() verfügbar sein.',

  // --- PhabricatorIteratedMD5PasswordHasher ---

  'Iterated MD5'
    => 'Iteriertes MD5',

  'To use iterated MD5, make the md5() function available.'
    => 'Um iteriertes MD5 zu verwenden, muss die Funktion md5() verfügbar sein.',

  'Weak, Insecure'
    => 'Schwach, unsicher',

  // --- PhabricatorPasswordHasher — hash validation and comparison ---

  "Password hash '%s' produced a hash of length %s, but a maximum length of %s was expected."
    => 'Passwort-Hash „%s" hat einen Hash der Länge %s erzeugt, aber maximal %s wurde erwartet.',

  'Malformed password hash, expected "name:hash".'
    => 'Ungültiger Passwort-Hash, erwartet wurde das Format „Name:Hash".',

  'Hasher "%s" may produce hashes which are too long to fit in storage. %d characters are available, but its hashes may be up to %d characters in length.'
    => 'Hasher „%s" könnte Hashes erzeugen, die zu lang für den Speicher sind. Es stehen %d Zeichen zur Verfügung, aber seine Hashes können bis zu %d Zeichen lang sein.',

  'There are no password hashers available which are usable for new passwords.'
    => 'Es sind keine Passwort-Hasher verfügbar, die für neue Passwörter verwendet werden können.',

  'Attempting to compare a password saved with the "%s" hash. The hasher exists, but is not currently usable. %s'
    => 'Versuch, ein mit dem Hash „%s" gespeichertes Passwort zu vergleichen. Der Hasher ist vorhanden, aber derzeit nicht verwendbar. %s',

  'Attempting to compare a password saved with the "%s" hash. No such hasher is known.'
    => 'Versuch, ein mit dem Hash „%s" gespeichertes Passwort zu vergleichen. Kein solcher Hasher ist bekannt.',

  'Expected a password hash, received nothing!'
    => 'Passwort-Hash erwartet, aber nichts erhalten!',

  // --- PhabricatorPasswordHasherTestCase ---

  'Exception on unparseable hash format.'
    => 'Exception bei nicht parsbarem Hash-Format.',

  'Fictional hasher unavailable.'
    => 'Fiktiver Hasher nicht verfügbar.',

  // --- PhabricatorSSHKeyGenerator ---

  'Can not generate keys: unable to find "%s" in PATH!'
    => 'Schlüssel können nicht generiert werden: „%s" wurde nicht in PATH gefunden!',

  // --- PhabricatorHashTestCase — test assertion labels ---

  'Input: %s'
    => 'Eingabe: %s',

  'Distinct characters in hash of: %s'
    => 'Verschiedene Zeichen im Hash von: %s',

  'Index digest of "%s".'
    => 'Index-Digest von „%s".',

  'Anchor digest of "%s".'
    => 'Anker-Digest von „%s".',

  // --- PhabricatorSlugTestCase ---

  "Normalization of '%s'"
    => 'Normalisierung von „%s"',

  'Hashtag normalization of "%s"'
    => 'Hashtag-Normalisierung von „%s"',

  "Ancestry of '%s'"
    => 'Vorfahren von „%s"',

  "Depth of '%s'"
    => 'Tiefe von „%s"',

  // --- PhabricatorPreambleTestCase ---

  'Address after stripping %d layers from: %s'
    => 'Adresse nach Entfernen von %d Schicht(en) aus: %s',

  // --- PhabricatorMetronomeTestCase ---

  'Tick at 11:11:13 AM.'
    => 'Tick um 11:11:13 Uhr.',

  'Tick at 11:12:13 AM.'
    => 'Tick um 11:12:13 Uhr.',

  // --- PhabricatorGlobalLockTestCase — test assertion labels ---

  'Connection Pool With Lock'
    => 'Verbindungspool mit Lock',

  'Connection Pool With Lock Released'
    => 'Verbindungspool mit freigegebenem Lock',

  'Specific Connection, No Lock'
    => 'Spezifische Verbindung, kein Lock',

  'Connection Pool + Specific, With Lock'
    => 'Verbindungspool + spezifisch, mit Lock',

  'Specific Connection, Holding Lock'
    => 'Spezifische Verbindung, Lock wird gehalten',

  'Connection Pool + Specific, With Lock Released'
    => 'Verbindungspool + spezifisch, Lock freigegeben',

  'Changing connection while locked is forbidden.'
    => 'Verbindungswechsel bei gehaltenem Lock ist nicht erlaubt.',

  'Expect multiple locks on the same connection to fail.'
    => 'Mehrere Locks auf derselben Verbindung sollten fehlschlagen.',

  'Establish Raw Lock'
    => 'Einfachen Lock einrichten',

  'Connection Pool with Held Lock'
    => 'Verbindungspool mit gehaltenem Lock',

  'Connection Pool After Lock Failure'
    => 'Verbindungspool nach Lock-Fehler',

  'Connection Pool After External Lock Failure'
    => 'Verbindungspool nach externem Lock-Fehler',

  // --- PhabricatorHash — range/length guards ---

  'Maximum must be larger than minimum.'
    => 'Maximum muss größer als Minimum sein.',

  'Length parameter in %s must be at least %s, but %s was provided.'
    => 'Längenparameter in %s muss mindestens %s betragen, aber es wurde %s angegeben.',

  // --- PhabricatorHash — HMAC-SHA256 ---

  'HMAC-SHA256 can only digest strings.'
    => 'HMAC-SHA256 kann nur Zeichenketten verarbeiten.',

  'HMAC-SHA256 keys must be strings.'
    => 'HMAC-SHA256-Schlüssel müssen Zeichenketten sein.',

  'HMAC-SHA256 requires a nonempty key.'
    => 'HMAC-SHA256 erfordert einen nicht leeren Schlüssel.',

  'Unable to compute HMAC-SHA256 digest of message.'
    => 'HMAC-SHA256-Digest der Nachricht konnte nicht berechnet werden.',

];
