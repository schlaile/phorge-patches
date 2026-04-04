<?php
// Fixup patches for infrastructure/query
// Correct "Spaces" → "Zonen" (established term) and "überhitzt" → clearer wording

return [

  // "overheated" → descriptive abort message (the metaphor doesn't work in DE)
  'Query (of class "%s") overheated: examined more than %s raw rows without finding %s visible objects.'
    => 'Abfrage (Klasse „%s") abgebrochen: Mehr als %s Rohzeilen wurden durchsucht, ohne %s sichtbare Objekte zu finden.',

  // Spaces → Zonen (established translation in the app modules)
  'You do not have access to any spaces.'
    => 'Du hast keinen Zugriff auf Zonen.',

  'You do not have access to any of the spaces this query is constrained to.'
    => 'Du hast keinen Zugriff auf die Zonen, auf die diese Abfrage eingeschränkt ist.',

  'This query (of class "%s") does not implement newResultObject(), but must implement this method to enable support for Spaces.'
    => 'Diese Abfrage (Klasse „%s") implementiert newResultObject() nicht, muss dies aber tun, um Zonen zu unterstützen.',

  'This query (of class "%s") returned an object of class "%s" from getNewResultObject(), but it does not implement the required interface ("%s"). Objects must implement this interface to enable Spaces support.'
    => 'Diese Abfrage (Klasse „%s") hat aus getNewResultObject() ein Objekt der Klasse „%s" zurückgegeben, das die erforderliche Schnittstelle „%s" nicht implementiert. Objekte müssen diese Schnittstelle implementieren, um Zonen zu unterstützen.',

  // "Space PHID" — technical field name, Zonen-PHID
  'Space PHID'
    => 'Zonen-PHID',

];

