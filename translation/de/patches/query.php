<?php
// Translation patches for infrastructure/query
// German (de)

return [

  // --- PhabricatorQueryOrderVector ---

  'An order vector can only be constructed from a list of strings or another order vector.'
    => 'Ein Sortiervektor kann nur aus einer Liste von Zeichenketten oder einem anderen Sortiervektor erstellt werden.',

  'An order vector must not be empty.'
    => 'Ein Sortiervektor darf nicht leer sein.',

  'Value with key "%s" in order vector is not a string (it has type "%s"). An order vector must contain only strings.'
    => 'Wert mit Schlüssel „%s" im Sortiervektor ist keine Zeichenkette (Typ: „%s"). Ein Sortiervektor darf nur Zeichenketten enthalten.',

  'Order vector "%s" specifies order "%s" twice. Each component of an ordering must be unique.'
    => 'Sortiervektor „%s" gibt Sortierung „%s" zweimal an. Jede Komponente einer Sortierung muss eindeutig sein.',

  // --- PhabricatorQuery ---

  'Can not build empty SELECT clause!'
    => 'Leere SELECT-Klausel kann nicht erstellt werden!',

  // --- PhabricatorCursorPagedPolicyAwareQuery — cursor handling ---

  'Expected to be passed a result object of class "LiskDAO" in "newExternalCursorStringForResult()", actually passed "%s". Return storage objects from "loadPage()" or override "newExternalCursorStringForResult()".'
    => 'In „newExternalCursorStringForResult()" wurde ein Ergebnisobjekt der Klasse „LiskDAO" erwartet, erhalten wurde „%s". Gib Speicherobjekte aus „loadPage()" zurück oder überschreibe „newExternalCursorStringForResult()".',

  'Cursor "%s" does not identify a valid object in query "%s".'
    => 'Cursor „%s" identifiziert kein gültiges Objekt in Abfrage „%s".',

  'Expected "newExternalCursorStringForResult()"  in class "%s" to return a string, but got "%s".'
    => '„newExternalCursorStringForResult()" in Klasse „%s" sollte eine Zeichenkette zurückgeben, aber gab „%s" zurück.',

  'Expected "newInternalCursorFromExternalCursor()" to return an object of class "PhabricatorQueryCursor", but got "%s" (in class "%s").'
    => '„newInternalCursorFromExternalCursor()" sollte ein Objekt der Klasse „PhabricatorQueryCursor" zurückgeben, aber gab „%s" zurück (in Klasse „%s").',

  'Expected "newPagingMapFromCursorObject()" to return a map of paging values, but got "%s" (in class "%s").'
    => '„newPagingMapFromCursorObject()" sollte eine Zuordnung von Paginierungswerten zurückgeben, aber gab „%s" zurück (in Klasse „%s").',

  'Map returned by "newPagingMapFromCursorObject()" in class "%s" omits required key "%s".'
    => 'Die von „newPagingMapFromCursorObject()" in Klasse „%s" zurückgegebene Zuordnung enthält den erforderlichen Schlüssel „%s" nicht.',

  // --- PhabricatorCursorPagedPolicyAwareQuery — Ferret engine ---

  'Unable to retrieve Ferret engine metadata, this class ("%s") does not support the Ferret engine.'
    => 'Ferret-Engine-Metadaten können nicht abgerufen werden: Klasse „%s" unterstützt die Ferret-Engine nicht.',

  'Query class ("%s") did not return the correct type of object from "newResultObject()" (expected a subclass of "PhabricatorLiskDAO", found "%s"). Return an object of the expected type (this is common), or implement a custom "loadPage()" method (this is unusual in modern code).'
    => 'Abfrageklasse „%s" hat in „newResultObject()" keinen korrekten Objekttyp zurückgegeben (erwartet: Unterklasse von „PhabricatorLiskDAO", gefunden: „%s"). Gib ein Objekt des erwarteten Typs zurück (üblich) oder implementiere eine eigene „loadPage()"-Methode (in modernem Code ungewöhnlich).',

  // --- PhabricatorCursorPagedPolicyAwareQuery — column/ordering ---

  'Column "%s" has null value, but does not specify a null behavior.'
    => 'Spalte „%s" hat einen Null-Wert, aber kein definiertes Null-Verhalten.',

  'Column "%s" has unknown column type "%s".'
    => 'Spalte „%s" hat unbekannten Spaltentyp „%s".',

  'Query "%s" does not support a builtin order "%s". Supported orders are: %s.'
    => 'Abfrage „%s" unterstützt keine vordefinierte Sortierung „%s". Unterstützte Sortierungen sind: %s.',

  'Two builtin orders ("%s" and "%s") define the same key or alias ("%s"). Each order alias and key must be unique and identify a single order.'
    => 'Zwei vordefinierte Sortierungen („%s" und „%s") definieren denselben Schlüssel oder Alias „%s". Jeder Sortierungsalias und -schlüssel muss eindeutig sein.',

  'This query ("%s") does not support sorting by order key "%s". Supported orders are: %s.'
    => 'Diese Abfrage („%s") unterstützt keine Sortierung nach Schlüssel „%s". Unterstützte Sortierungen sind: %s.',

  'Order vector "%s" is invalid: the last column in an order must be a column with unique values, but "%s" is not unique.'
    => 'Sortiervektor „%s" ist ungültig: Die letzte Spalte einer Sortierung muss eindeutige Werte haben, aber „%s" ist nicht eindeutig.',

  'Order vector "%s" is invalid: only the last column in an order may be unique, but "%s" is a unique column and not the last column in the order.'
    => 'Sortiervektor „%s" ist ungültig: Nur die letzte Spalte einer Sortierung darf eindeutig sein, aber „%s" ist eine eindeutige Spalte und nicht die letzte.',

  'NULL value "%s" is invalid. Valid values are "head" and "tail".'
    => 'NULL-Wert „%s" ist ungültig. Gültige Werte sind „head" und „tail".',

  // --- PhabricatorCursorPagedPolicyAwareQuery — index/constraint ---

  'Attempting to apply a range constraint to a field with index type "%s", expected type "%s".'
    => 'Versuch, eine Bereichseinschränkung auf ein Feld mit Indextyp „%s" anzuwenden, erwartet wurde Typ „%s".',

  'Unknown index type "%s"!'
    => 'Unbekannter Indextyp „%s"!',

  'Unknown constraint condition "%s"!'
    => 'Unbekannte Einschränkungsbedingung „%s"!',

  'No support for applying operator "%s" against index of type "%s".'
    => 'Operator „%s" kann nicht auf Index vom Typ „%s" angewendet werden.',

  // --- PhabricatorCursorPagedPolicyAwareQuery — Ferret fulltext ---

  'Query ("%s") does not support the Ferret fulltext engine.'
    => 'Abfrage „%s" unterstützt die Ferret-Volltextsuch-Engine nicht.',

  'Query may not have multiple fulltext constraints.'
    => 'Eine Abfrage darf nicht mehrere Volltext-Einschränkungen haben.',

  'Query class ("%s") must define "newResultObject()" to use Ferret constraints.'
    => 'Abfrageklasse „%s" muss „newResultObject()" definieren, um Ferret-Einschränkungen zu verwenden.',

  'This query uses a fulltext function which this document type does not support.'
    => 'Diese Abfrage verwendet eine Volltextfunktion, die dieser Dokumenttyp nicht unterstützt.',

  // --- PhabricatorCursorPagedPolicyAwareQuery — edge logic ---

  'This query matches only unowned documents owned by anyone, which is impossible.'
    => 'Diese Abfrage sucht nach Dokumenten ohne Eigentümer, die gleichzeitig jemandem gehören – das ist unmöglich.',

  'This query specifies an empty constraint.'
    => 'Diese Abfrage enthält eine leere Einschränkung.',

  'This query is constrained by a project you do not have permission to see.'
    => 'Diese Abfrage ist durch ein Projekt eingeschränkt, auf das Du keine Zugriffsberechtigung hast.',

  'This query specifies only() more than once.'
    => 'Diese Abfrage verwendet only() mehr als einmal.',

  'This query specifies only(), but no other constraints which it can apply to.'
    => 'Diese Abfrage verwendet only(), aber keine weiteren Einschränkungen, auf die es angewendet werden könnte.',

  // --- PhabricatorCursorPagedPolicyAwareQuery — Spaces ---

  'This query (of class "%s") does not implement newResultObject(), but must implement this method to enable support for Spaces.'
    => 'Diese Abfrage (Klasse „%s") implementiert newResultObject() nicht, muss dies aber tun, um Spaces zu unterstützen.',

  'This query (of class "%s") returned an object of class "%s" from getNewResultObject(), but it does not implement the required interface ("%s"). Objects must implement this interface to enable Spaces support.'
    => 'Diese Abfrage (Klasse „%s") hat aus getNewResultObject() ein Objekt der Klasse „%s" zurückgegeben, das die erforderliche Schnittstelle „%s" nicht implementiert. Objekte müssen diese Schnittstelle implementieren, um Spaces zu unterstützen.',

  'You do not have access to any spaces.'
    => 'Du hast keinen Zugriff auf Spaces.',

  'You do not have access to any of the spaces this query is constrained to.'
    => 'Du hast keinen Zugriff auf die Spaces, auf die diese Abfrage eingeschränkt ist.',

  // --- PhabricatorQueryCursor — raw row access ---

  'Caller is trying to "getRawRowProperty()" with key "%s", but this cursor has no raw row.'
    => 'Aufruf von „getRawRowProperty()" mit Schlüssel „%s" nicht möglich: Dieser Cursor hat keine Rohzeile.',

  'Caller is trying to access raw row property "%s", but the row does not have this property.'
    => 'Zugriff auf Rohzeileneigenschaft „%s" nicht möglich: Die Zeile hat diese Eigenschaft nicht.',

  // --- PhabricatorPolicyAwareQuery ---

  'Expected a single result!'
    => 'Genau ein Ergebnis erwartet!',

  'Query (of class "%s") overheated: examined more than %s raw rows without finding %s visible objects.'
    => 'Abfrage (Klasse „%s") überhitzt: Mehr als %s Rohzeilen wurden durchsucht, ohne %s sichtbare Objekte zu finden.',

];
