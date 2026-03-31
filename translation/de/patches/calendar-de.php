<?php
/**
 * German translation patches for the Calendar application.
 * Applied with: php scripts/patch_po.php --po translation/de/work/phorge-de-work.po --patches translation/de/patches/calendar-de.php
 *
 * Established vocabulary:
 *   event            = Termin
 *   host             = Gastgeber
 *   invitees (list)  = Teilnehmer
 *   Event Invitees (policy label) = Mögliche Teilnehmer
 *   recurring event  = Regelmäßiger Termin (confirmed)
 *   recurrence       = Wiederholung
 *   series           = Terminserie
 *   away             = Außer Haus
 *   busy             = Beschäftigt
 *   cancelled        = Abgesagt   (event cancelled by host)
 *   declined         = Abgelehnt  (invitee declined RSVP)
 *   import           = Import
 *   export           = Export
 */
return [

    // -------------------------------------------------------------------------
    // Policy rules
    // -------------------------------------------------------------------------
    'Event Host'
        => 'Gastgeber',
    'The host of this event can take this action.'
        => 'Der Gastgeber dieses Termins kann diese Aktion ausführen.',
    'event host'
        => 'Gastgeber',
    'Event Invitees'
        => 'Mögliche Teilnehmer',
    'Users invited to this event can take this action.'
        => 'Zu diesem Termin eingeladene Benutzer können diese Aktion ausführen.',
    'event invitees'
        => 'Mögliche Teilnehmer',
    'The host of an event can always view and edit it.'
        => 'Der Gastgeber eines Termins kann ihn immer ansehen und bearbeiten.',
    'Users who are invited to an event can always view it.'
        => 'Zu einem Termin eingeladene Benutzer können ihn immer ansehen.',
    'Uses Import Policy'
        => 'Verwendet Import-Richtlinie',

    // -------------------------------------------------------------------------
    // Herald / trigger
    // -------------------------------------------------------------------------
    'React to events being created or updated.'
        => 'Auf erstellte oder aktualisierte Termine reagieren.',
    "An event's name, status, invite list, icon, and description changes."
        => 'Name, Status, Teilnehmerliste, Icon oder Beschreibung eines Termins ändern sich.',
    "An event's start and end date and cancellation status changes."
        => 'Beginn, Ende oder Absagestatus eines Termins ändern sich.',

    // -------------------------------------------------------------------------
    // Import update frequency
    // -------------------------------------------------------------------------
    'Update Hourly'
        => 'Stündlich aktualisieren',
    'Update Daily'
        => 'Täglich aktualisieren',

    // -------------------------------------------------------------------------
    // RSVP status
    // -------------------------------------------------------------------------
    'Declined'
        => 'Abgelehnt',
    '%s declined this event.'
        => '%s hat die Teilnahme an diesem Termin abgelehnt.',
    '%s declined %s.'
        => '%s hat die Teilnahme an %s abgelehnt.',

    // -------------------------------------------------------------------------
    // Event properties
    // -------------------------------------------------------------------------
    'event'
        => 'Termin',
    'The name of the event.'
        => 'Der Name des Termins.',
    'Event host is required.'
        => 'Ein Gastgeber für den Termin ist erforderlich.',
    'Host PHID "%s" is not a valid user PHID.'
        => 'Gastgeber-PHID „%s" ist keine gültige Benutzer-PHID.',
    'Event Series'
        => 'Terminserie',
    'Series Event'
        => 'Serientermin',
    'Event Start'
        => 'Terminbeginn',
    'External Invitee'
        => 'Externer Eingeladener',
    'Hosts'
        => 'Gastgeber',
    'Hosted by %s'
        => 'Gastgeber: %s',

    // -------------------------------------------------------------------------
    // Event actions / edit form labels
    // -------------------------------------------------------------------------
    'Create New Event'
        => 'Neuer Termin',
    'Rename the event.'
        => 'Den Termin umbenennen.',
    'New event name.'
        => 'Neuer Terminname.',
    'Normal Event'
        => 'Normaler Termin',
    'New event start time.'
        => 'Neuer Terminbeginn.',
    'New event end time.'
        => 'Neues Terminende.',
    'Cancel the event.'
        => 'Den Termin absagen.',
    'Change the host of the event.'
        => 'Den Gastgeber des Termins ändern.',
    'New event host.'
        => 'Neuer Gastgeber des Termins.',
    'Change invited users.'
        => 'Eingeladene Benutzer ändern.',
    'Change Invitees'
        => 'Eingeladene ändern',
    'Description of the event.'
        => 'Beschreibung des Termins.',
    'New event icon.'
        => 'Neues Icon für den Termin.',
    'Browse Invitees'
        => 'Eingeladene durchsuchen',
    'Type a user or project name, or function...'
        => 'Benutzernamen, Projektnamen oder Funktion eingeben...',
    'Configure Calendar Event Forms'
        => 'Kalender-Terminformulare konfigurieren',
    'Default view policy for newly created events.'
        => 'Standard-Ansichtsrichtlinie für neu erstellte Termine.',

    // -------------------------------------------------------------------------
    // Icon changes
    // -------------------------------------------------------------------------
    '%s changed the event icon from %s to %s.'
        => '%s hat das Icon dieses Termins von %s auf %s geändert.',
    '%s changed the icon for %s from %s to %s.'
        => '%s hat das Icon für %s von %s auf %s geändert.',

    // -------------------------------------------------------------------------
    // Host changes
    // -------------------------------------------------------------------------
    '%s changed the host of this event from %s to %s.'
        => '%s hat den Gastgeber dieses Termins von %s auf %s geändert.',
    '%s changed the host of %s from %s to %s.'
        => '%s hat den Gastgeber von %s von %s auf %s geändert.',

    // -------------------------------------------------------------------------
    // Invitees (transactions)
    // -------------------------------------------------------------------------
    '%s invited %s attendee(s): %s.'
        => '%s hat %s Teilnehmer eingeladen: %s.',
    '%s uninvited %s attendee(s): %s.'
        => '%s hat %s Teilnehmer ausgeladen: %s.',
    '%s invited %s attendee(s): %s; uninvited %s attendee(s): %s.'
        => '%s hat %s Teilnehmer eingeladen: %s; %s Teilnehmer ausgeladen: %s.',
    '%s invited %s attendee(s) to %s: %s.'
        => '%s hat %s Teilnehmer zu %s eingeladen: %s.',
    '%s uninvited %s attendee(s) to %s: %s.'
        => '%s hat %s Teilnehmer von %s ausgeladen: %s.',
    '%s updated the invite list for %s, invited %s: %s; uninvited %s: %s.'
        => '%s hat die Teilnehmerliste für %s aktualisiert; eingeladen %s: %s; ausgeladen %s: %s.',
    'Invitee "%s" identifies an object that does not exist or which you do not have permission to view.'
        => 'Eingeladene(r) „%s" bezeichnet ein Objekt, das nicht existiert oder für das keine Leseberechtigung besteht.',

    // -------------------------------------------------------------------------
    // Start / End dates
    // -------------------------------------------------------------------------
    '%s changed the start date for this event from %s to %s.'
        => '%s hat den Beginn dieses Termins von %s auf %s geändert.',
    '%s changed the start date for %s from %s to %s.'
        => '%s hat den Beginn von %s von %s auf %s geändert.',
    'Start date is invalid.'
        => 'Das Startdatum ist ungültig.',
    '%s changed the end date for this event from %s to %s.'
        => '%s hat das Ende dieses Termins von %s auf %s geändert.',
    '%s changed the end date for %s from %s to %s.'
        => '%s hat das Ende von %s von %s auf %s geändert.',
    'End date is invalid.'
        => 'Das Enddatum ist ungültig.',

    // -------------------------------------------------------------------------
    // Recurrence / Repeat
    // -------------------------------------------------------------------------
    'Recurring'
        => 'Wiederkehrend',
    'Recurrence'
        => 'Wiederholung',
    'One-Time Event'
        => 'Einmaliger Termin',
    'Frequency'
        => 'Häufigkeit',
    'Recurring event frequency.'
        => 'Häufigkeit des wiederkehrenden Termins.',
    'Change the event frequency.'
        => 'Die Häufigkeit des Termins ändern.',
    'New event frequency.'
        => 'Neue Häufigkeit des Termins.',
    'Weekly recurring event.'
        => 'Wöchentlich wiederkehrender Termin.',
    'Edit Recurrence'
        => 'Wiederholung bearbeiten',
    'Make Recurring'
        => 'Als wiederkehrend festlegen',
    '%s changed this event to repeat until %s.'
        => '%s hat diesen Termin auf Wiederholung bis %s geändert.',
    '%s changed this event to repeat forever.'
        => '%s hat diesen Termin auf unbegrenzte Wiederholung geändert.',
    '%s changed %s to repeat until %s.'
        => '%s hat %s auf Wiederholung bis %s geändert.',
    '%s changed %s to repeat forever.'
        => '%s hat %s auf unbegrenzte Wiederholung geändert.',
    'Repeat until date is invalid.'
        => 'Das Wiederholungs-Enddatum ist ungültig.',
    'Correct event indexes with start date.'
        => 'Terminindizes mit Startdatum korrigieren.',
    'Unable to generate a new child event for an event which is not a recurring parent event!'
        => 'Es kann kein untergeordneter Termin für einen Termin erzeugt werden, der kein wiederkehrender Elterntermin ist!',
    'An event can not be stopped from recurring once it has been made recurring. You can cancel the event.'
        => 'Ein Termin kann nicht aus der Wiederholung herausgenommen werden, sobald er als wiederkehrend festgelegt wurde. Du kannst den Termin jedoch absagen.',

    // -------------------------------------------------------------------------
    // Series edit / cancel / reinstate actions
    // -------------------------------------------------------------------------
    'Cancel Only This Event'
        => 'Nur diesen Termin absagen',
    'Cancel This And All Later Events'
        => 'Diesen und alle späteren Termine absagen',
    'Cancel this event and all events in the series which occur on or after %s.'
        => 'Diesen Termin und alle Termine der Reihe ab %s absagen.',
    'This event is part of a series. Which events do you want to cancel?'
        => 'Dieser Termin ist Teil einer Terminserie. Welche Termine sollen abgesagt werden?',
    'Reinstate Only This Event'
        => 'Nur diesen Termin wieder aktivieren',
    'Reinstate This And All Later Events'
        => 'Diesen und alle späteren Termine wieder aktivieren',
    'Reinstate this event and all events in the series which occur on or after %s.'
        => 'Diesen Termin und alle Termine der Reihe ab %s wieder aktivieren.',
    'This event is part of a series. Which events do you want to reinstate?'
        => 'Dieser Termin ist Teil einer Terminserie. Welche Termine sollen wieder aktiviert werden?',
    'Edit Only This Event'
        => 'Nur diesen Termin bearbeiten',
    'Edit this event and all events in the series which occur on or after %s. This will overwrite previous edits!'
        => 'Diesen Termin und alle Termine der Reihe ab %s bearbeiten. Dabei werden frühere Bearbeitungen überschrieben!',
    'This event is part of a series. Which events do you want to edit?'
        => 'Dieser Termin ist Teil einer Terminserie. Welche Termine sollen bearbeitet werden?',
    'This event is an instance in an event series. To change the behavior for the series, edit the parent event.'
        => 'Dieser Termin ist ein Element einer Terminserie. Um das Verhalten der gesamten Serie zu ändern, den Elterntermin bearbeiten.',
    'This event instance has not been created yet. Log in to create it.'
        => 'Dieser Termin wurde noch nicht erstellt. Zum Erstellen bitte anmelden.',

    // -------------------------------------------------------------------------
    // All-day event
    // -------------------------------------------------------------------------
    '%s changed this to an all day event.'
        => '%s hat diesen Termin zu einem Ganztagstermin gemacht.',
    '%s changed %s to an all day event.'
        => '%s hat %s zu einem Ganztagstermin gemacht.',
    'Yearly event.'
        => 'Jährlicher Termin.',

    // -------------------------------------------------------------------------
    // Availability (Away / Busy)
    // -------------------------------------------------------------------------
    'Away at %s until %s.'
        => 'Außer Haus (%s) bis %s.',
    'Away until %s.'
        => 'Außer Haus bis %s.',
    'Busy at %s until %s.'
        => 'Beschäftigt (%s) bis %s.',
    'Busy until %s.'
        => 'Beschäftigt bis %s.',
    'You can not change your display availability for events you are not attending.'
        => 'Du kannst deine angezeigte Verfügbarkeit nicht für Termine ändern, an denen du nicht teilnimmst.',

    // -------------------------------------------------------------------------
    // Export
    // -------------------------------------------------------------------------
    'Calendar Export'
        => 'Kalender-Export',
    'Calendar Exports'
        => 'Kalender-Exporte',
    'All Exports'
        => 'Alle Exporte',
    'Export %d'
        => 'Export %d',
    'No exports found.'
        => 'Keine Exporte gefunden.',
    'No Exports Configured'
        => 'Keine Exporte konfiguriert',
    'You have not set up any events for export from Calendar yet. See the documentation for instructions on how to get started.'
        => 'Es wurden noch keine Termine für den Kalender-Export eingerichtet. Anleitungen zum Einstieg finden sich in der Dokumentation.',
    'Calendar exports must have a name.'
        => 'Kalender-Exporte müssen einen Namen haben.',
    '%s renamed this export from %s to %s.'
        => '%s hat diesen Export von „%s" in „%s" umbenannt.',
    'Create New Export'
        => 'Neuen Export anlegen',
    'Edit Export: %s'
        => 'Export bearbeiten: %s',
    'Create Export'
        => 'Export anlegen',
    'Edit Export'
        => 'Export bearbeiten',
    'New export name.'
        => 'Neuer Export-Name.',
    'Disable the export.'
        => 'Den Export deaktivieren.',
    'Query to execute.'
        => 'Auszuführende Abfrage.',
    'Change the export query key.'
        => 'Den Abfrageschlüssel des Exports ändern.',
    'Change the policy mode for the export.'
        => 'Den Richtlinienmodus des Exports ändern.',
    'Disable Export'
        => 'Export deaktivieren',
    'Enable Export'
        => 'Export aktivieren',
    '%s created this export.'
        => '%s hat diesen Export erstellt.',
    '%s disabled this export.'
        => '%s hat diesen Export deaktiviert.',
    '%s enabled this export.'
        => '%s hat diesen Export aktiviert.',
    '%s changed the policy mode for this export from %s to %s.'
        => '%s hat den Richtlinienmodus dieses Exports von %s auf %s geändert.',
    '%s changed the query for this export.'
        => '%s hat die Abfrage für diesen Export geändert.',
    'This export has an invalid mode ("%s").'
        => 'Dieser Export hat einen ungültigen Modus („%s").',
    'Guide: Exporting Events'
        => 'Leitfaden: Termine exportieren',
    'Export as .ics'
        => 'Als .ics exportieren',
    'Anyone who knows the URI for this export can view all event details as though they were logged in with your account.'
        => 'Jeder, der die URI dieses Exports kennt, kann alle Termindetails so ansehen, als wäre er mit deinem Konto angemeldet.',
    'Enable this export? Anyone who knows the export URI will be able to export the data.'
        => 'Diesen Export aktivieren? Jeder, der die Export-URI kennt, kann die Daten exportieren.',

    // -------------------------------------------------------------------------
    // Import
    // -------------------------------------------------------------------------
    'Calendar Import'
        => 'Kalender-Import',
    'Calendar Imports'
        => 'Kalender-Importe',
    'Calendar Import Logs'
        => 'Kalender-Import-Protokolle',
    'All Imports'
        => 'Alle Importe',
    'No imports found.'
        => 'Keine Importe gefunden.',
    'Import Sources'
        => 'Importquellen',
    'Import Type'
        => 'Import-Typ',
    'New Import'
        => 'Neuer Import',
    'Choose Import Type'
        => 'Import-Typ auswählen',
    'Create New Import'
        => 'Neuen Import anlegen',
    'Edit Import: %s'
        => 'Import bearbeiten: %s',
    'Create Import'
        => 'Import anlegen',
    'Edit Import'
        => 'Import bearbeiten',
    'Rename the import.'
        => 'Den Import umbenennen.',
    'New import name.'
        => 'Neuer Import-Name.',
    'Disable the import.'
        => 'Den Import deaktivieren.',
    'Update Automatically'
        => 'Automatisch aktualisieren',
    'Imports'
        => 'Importe',
    'Enable Import'
        => 'Import aktivieren',
    'Disable Import'
        => 'Import deaktivieren',
    'Import Disabled'
        => 'Import deaktiviert',
    'Unable to Disable'
        => 'Deaktivieren nicht möglich',
    'Next Update'
        => 'Nächste Aktualisierung',
    'Log Messages'
        => 'Protokollmeldungen',
    'Imported Events'
        => 'Importierte Termine',
    'Import Events'
        => 'Termine importieren',
    'Imported By'
        => 'Importiert von',
    '%s created this import.'
        => '%s hat diesen Import erstellt.',
    '%s named this import %s.'
        => '%s hat diesen Import „%s" benannt.',
    '%s removed the name of this import (was: %s).'
        => '%s hat den Namen dieses Imports entfernt (war: %s).',
    '%s renamed this import from %s to %s.'
        => '%s hat diesen Import von „%s" in „%s" umbenannt.',
    '%s updated the import URI.'
        => '%s hat die Import-URI aktualisiert.',
    '%s disabled this import.'
        => '%s hat diesen Import deaktiviert.',
    '%s enabled this import.'
        => '%s hat diesen Import aktiviert.',
    '%s changed the automatic update frequency for this import.'
        => '%s hat die automatische Aktualisierungshäufigkeit dieses Imports geändert.',
    '%s imported an ICS file.'
        => '%s hat eine ICS-Datei importiert.',
    '%s deleted imported events from this source.'
        => '%s hat importierte Termine aus dieser Quelle gelöscht.',
    '%s reloaded this event source.'
        => '%s hat diese Terminquelle neu geladen.',
    'Failed to load import with PHID "%s".'
        => 'Import mit PHID „%s" konnte nicht geladen werden.',
    'Importing Events'
        => 'Termine importieren',
    'Exporting Events'
        => 'Termine exportieren',
    'Imported'
        => 'Importiert',
    'No Events Imported'
        => 'Keine Termine importiert.',
    'No Imported Events'
        => 'Keine importierten Termine',
    'Disable this import? Events from this source will no longer be updated.'
        => 'Diesen Import deaktivieren? Termine aus dieser Quelle werden nicht mehr aktualisiert.',
    'No events from this source currently exist. They may have failed to import, have been updated by another source, or already have been deleted.'
        => 'Zurzeit sind keine Termine aus dieser Quelle vorhanden. Möglicherweise ist der Import fehlgeschlagen, eine andere Quelle hat sie aktualisiert, oder sie wurden bereits gelöscht.',
    'Delete all the events that were imported from this source? This action can not be undone.'
        => 'Alle aus dieser Quelle importierten Termine löschen? Diese Aktion kann nicht rückgängig gemacht werden.',
    'Reload this source? Events imported from this source will be updated.'
        => 'Diese Quelle neu laden? Aus dieser Quelle importierte Termine werden aktualisiert.',
    'This event has been imported from an external source and can not be edited.'
        => 'Dieser Termin wurde aus einer externen Quelle importiert und kann nicht bearbeitet werden.',
    'Imported events can not be edited.'
        => 'Importierte Termine können nicht bearbeitet werden.',
    'Queued for background import: data size (%s) exceeds limit for immediate processing (%s).'
        => 'Zur Hintergrundverarbeitung in Warteschlange gestellt: Datengröße (%s) überschreitet das Limit für sofortige Verarbeitung (%s).',

    // -------------------------------------------------------------------------
    // ICS files
    // -------------------------------------------------------------------------
    '.ics File'
        => '.ics-Datei',
    'Source File'
        => 'Quelldatei',
    'ICS File'
        => 'ICS-Datei',
    'File PHID.'
        => 'Datei-PHID.',
    'ICS File "%s"'
        => 'ICS-Datei „%s"',
    'Source URI'
        => 'Quell-URI',
    'New URI.'
        => 'Neue URI.',
    'You must select an ".ics" URI to import.'
        => 'Zum Importieren muss eine „.ics"-URI ausgewählt werden.',
    'You must select an ".ics" file to import.'
        => 'Zum Importieren muss eine „.ics"-Datei ausgewählt werden.',
    'You can not attach an ICS file to an import type other than an ICS import (type is "%s").'
        => 'Eine ICS-Datei kann nur an einen ICS-Import angehängt werden (Typ ist „%s").',
    'You can not attach an ICS URI to an import type other than an ICS URI import (type is "%s").'
        => 'Eine ICS-URI kann nur an einen ICS-URI-Import angehängt werden (Typ ist „%s").',
    'You can not disable import of an ICS file because the entire import occurs immediately when you upload the file. There is no further activity to disable.'
        => 'Der Import einer ICS-Datei kann nicht deaktiviert werden, da der gesamte Import sofort beim Hochladen der Datei erfolgt. Es gibt keine weitere Aktivität, die deaktiviert werden könnte.',
    'Drop .ics Files to Import'
        => '.ics-Dateien zum Importieren hier ablegen',
    'Drag and drop .ics files to upload them and import them into Calendar.'
        => '.ics-Dateien per Drag-and-Drop hochladen und in den Kalender importieren.',
    'Nothing Uploaded'
        => 'Nichts hochgeladen',

    // -------------------------------------------------------------------------
    // ICS parser errors
    // -------------------------------------------------------------------------
    'Expected all "BEGIN:" sections in ICS document to have corresponding "END:" sections.'
        => 'Es wird erwartet, dass alle „BEGIN:"-Abschnitte im ICS-Dokument entsprechende „END:"-Abschnitte haben.',
    'First line of ICS file begins with a space or tab, but this marks a line which should be unfolded.'
        => 'Die erste Zeile der ICS-Datei beginnt mit einem Leerzeichen oder Tabulator, was eine entfaltete Zeile kennzeichnet.',
    "ICS Parse Error near line %s:\n\n>>> %s\n\n%s"
        => "ICS-Parse-Fehler in der Nähe von Zeile %s:\n\n>>> %s\n\n%s",
    'Unable to write ICS document: event has no UID, but each event MUST have a UID.'
        => 'ICS-Dokument kann nicht geschrieben werden: Termin hat keine UID, aber jeder Termin MUSS eine UID haben.',
    'Unable to write ICS document: event has no modified time, but each event MUST have a modified time.'
        => 'ICS-Dokument kann nicht geschrieben werden: Termin hat keine Änderungszeit, aber jeder Termin MUSS eine Änderungszeit haben.',
    'Error parsing DATE-TIME: %s'
        => 'Fehler beim Auswerten von DATE-TIME: %s',
    'Multiple date lists.'
        => 'Mehrere Datumslisten.',
    'Datetime has no timezone or viewer timezone.'
        => 'Datum/Uhrzeit hat keine Zeitzone, und die Benutzer-Zeitzone ist nicht gesetzt.',
    'Expected ISO8601 datetime in the format "19990105T112233Z", found "%s".'
        => 'ISO8601-Datum/Uhrzeit im Format „19990105T112233Z" erwartet, gefunden: „%s".',
    'ISO8601 date ends in "Z" indicating UTC, but a timezone other than UTC ("%s") was specified.'
        => 'ISO8601-Datum endet auf „Z" (UTC), aber es wurde eine andere Zeitzone angegeben: „%s".',

    // -------------------------------------------------------------------------
    // RRULE errors
    // -------------------------------------------------------------------------
    'Recurring event range queries must have an end date, a limit, or both.'
        => 'Bereichsabfragen für wiederkehrende Termine müssen ein Enddatum, ein Limit oder beides haben.',
    'RRULE dictionary includes unknown key "%s". Expected keys are: %s.'
        => 'RRULE-Dictionary enthält unbekannten Schlüssel „%s". Erwartete Schlüssel: %s.',
    'Unexpected value "%s" in "%s" RULE property: expected an integer.'
        => 'Unerwarteter Wert „%s" in der RULE-Eigenschaft „%s": Ganzzahl erwartet.',
    'Unexpected value "%s" in "%s" RRULE property: expected only integers.'
        => 'Unerwarteter Wert „%s" in der RRULE-Eigenschaft „%s": Nur Ganzzahlen erwartet.',
    'Weekday "%s" is not a valid weekday constant. Valid constants are: %s.'
        => 'Wochentag „%s" ist kein gültiger Wochentag-Bezeichner. Gültige Bezeichner: %s.',
    'RRULE BYDAY value "%s" is invalid: rule part must be in the expected form (like "MO", "-3TH", or "+2SU").'
        => 'RRULE-BYDAY-Wert „%s" ist ungültig: Der Regelanteil muss das erwartete Format haben (z. B. „MO", „-3TH" oder „+2SU").',
    'RRULE BYDAY value "%s" has an offset with magnitude "%s", but the maximum permitted value is "%s".'
        => 'RRULE-BYDAY-Wert „%s" hat einen Versatz mit dem Betrag „%s", der Maximalwert ist jedoch „%s".',
    'RRULE specifies BYMONTHDAY with FREQ set to WEEKLY, which violates RFC5545.'
        => 'RRULE gibt BYMONTHDAY an, während FREQ auf WEEKLY gesetzt ist – das verstößt gegen RFC5545.',
    'RRULE specifies BYYEARDAY with FREQ of DAILY, WEEKLY or MONTHLY, which violates RFC5545.'
        => 'RRULE gibt BYYEARDAY an, während FREQ DAILY, WEEKLY oder MONTHLY ist – das verstößt gegen RFC5545.',
    'RRULE evaluation failed to generate more events in the next 100 years. This RRULE is likely invalid or degenerate.'
        => 'Die RRULE-Auswertung konnte in den nächsten 100 Jahren keine weiteren Termine erzeugen. Diese RRULE ist wahrscheinlich ungültig oder entartet.',
    'Value "%s" in RRULE "%s" parameter is invalid: values must be integers.'
        => 'Wert „%s" im RRULE-Parameter „%s" ist ungültig: Werte müssen Ganzzahlen sein.',
    'Value "%s" in RRULE "%s" parameter is invalid: it must be between %s and %s.'
        => 'Wert „%s" im RRULE-Parameter „%s" ist ungültig: Er muss zwischen %s und %s liegen.',
    'Value "%s" in RRULE "%s" parameter is invalid: it must not be zero.'
        => 'Wert „%s" im RRULE-Parameter „%s" ist ungültig: Er darf nicht null sein.',

    // -------------------------------------------------------------------------
    // Import log labels
    // -------------------------------------------------------------------------
    'Imported Event'
        => 'Importierter Termin',
    'Updated Event'
        => 'Aktualisierter Termin',
    'Deleted Event'
        => 'Gelöschter Termin',
    'Duplicate Event'
        => 'Doppelter Termin',
    'Original Event'
        => 'Ursprünglicher Termin',
    'Ignored Node'
        => 'Ignorierter Knoten',
    'Ignored an event with an out-of-range date. Only dates between 1970 and 2037 are supported.'
        => 'Ein Termin mit einem Datum außerhalb des unterstützten Bereichs wurde ignoriert. Nur Daten zwischen 1970 und 2037 werden unterstützt.',
    'Ignored an event with an unsupported frequency rule ("%s"). Events which repeat more frequently than daily are not supported.'
        => 'Ein Termin mit einer nicht unterstützten Häufigkeitsregel („%s") wurde ignoriert. Termine, die häufiger als täglich wiederkehren, werden nicht unterstützt.',
    'Ignored an event (%s) because the original version of this event was created here.'
        => 'Ein Termin (%s) wurde ignoriert, weil die ursprüngliche Version dieses Termins hier erstellt wurde.',
    'Too Frequent'
        => 'Zu häufig',
    'Fetched Calendar'
        => 'Kalender abgerufen',
    'Triggered a periodic update.'
        => 'Periodische Aktualisierung ausgelöst.',
    'Unknown Message "%s"'
        => 'Unbekannte Nachricht „%s"',
    'Unknown Message'
        => 'Unbekannte Nachricht',
    'ICS: %s'
        => 'ICS: %s',
    '%s from %s'
        => '%s von %s',

    // -------------------------------------------------------------------------
    // Ghost event query
    // -------------------------------------------------------------------------
    'Event queries which generate ghost events must include either a result limit or an end date, because they may otherwise generate an infinite number of results. This query has neither.'
        => 'Terminabfragen, die Geister-Termine erzeugen, müssen entweder ein Ergebnislimit oder ein Enddatum enthalten, da sie sonst eine unbegrenzte Anzahl von Ergebnissen erzeugen könnten. Diese Abfrage enthält beides nicht.',

    // -------------------------------------------------------------------------
    // Icons
    // -------------------------------------------------------------------------
    'Choose Event Icon'
        => 'Icon für den Termin wählen',
    'Sabbatical / Leave'
        => 'Sabbatical / Urlaub',

    // -------------------------------------------------------------------------
    // Misc UI
    // -------------------------------------------------------------------------
    'Reload Events'
        => 'Termine neu laden',
    'Delete Events'
        => 'Termine löschen',
    'Invalid Trigger'
        => 'Ungültiger Auslöser',
    'Calendar User Guide'
        => 'Kalender-Benutzerhandbuch',
    'Show invites the current viewer is invited to. This function includes events the user is invited to because a project they are a member of is invited.'
        => 'Zeigt Termine an, zu denen der aktuelle Benutzer eingeladen ist. Dazu gehören auch Termine, zu denen ein Projekt eingeladen wurde, dem der Benutzer angehört.',
    'To RSVP to the event, specify the desired RSVP, like `!rsvp yes`. This table shows the configured names for rsvp\'s.'
        . "\n\n%s\n\n"
        . 'If you specify an invalid rsvp, the command is ignored. This command has no effect if you do not specify an rsvp.'
        => 'Um auf einen Termin zu antworten, den gewünschten RSVP-Befehl eingeben, z. B. `!rsvp yes`. Diese Tabelle zeigt die konfigurierten RSVP-Namen.'
        . "\n\n%s\n\n"
        . 'Bei einem ungültigen RSVP-Befehl wird dieser ignoriert. Der Befehl hat keine Wirkung, wenn kein RSVP angegeben wird.',
    'Notify about events in the next __N__ minutes (default: 15). Setting this to a larger value makes testing easier.'
        => 'Über Termine in den nächsten __N__ Minuten benachrichtigen (Standard: 15). Ein größerer Wert erleichtert das Testen.',
    'Reload event imports from the command line. Useful for testing and debugging importers.'
        => 'Kalender-Importe von der Kommandozeile neu laden. Nützlich zum Testen und Debuggen von Importern.',

];
