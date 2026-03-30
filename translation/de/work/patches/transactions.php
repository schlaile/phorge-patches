<?php

// German translations for the transactions application.
// Covers: EditEngine forms, transaction log messages, bulk edit,
//         export CLI, subscriber/watcher/contributor patterns, MFA, locks.
//
// Terminology:
//   Transaction      = Transaktion
//   EditEngine       = EditEngine  (technical term, keep)
//   Form             = Formular
//   Create Form      = Erstellungsformular
//   Edit Form        = Bearbeitungsformular
//   Subtype          = Untertyp
//   Bulk Edit        = Stapelbearbeitung
//   Inline comment   = Inline-Kommentar
//   Edge             = Verknüpfungskante
//   Monogram         = Monogramm  (e.g. T123)
//   Subscriber       = Mitleser
//   Watcher          = Beobachter
//   Contributor      = Beitragender
//   Unsubscriber     = Abbestellung

return [

  // -------------------------------------------------------------------------
  // Object transaction log messages
  // -------------------------------------------------------------------------

  '%s created this object.'
    => '%s hat dieses Objekt erstellt.',
  '%s created this object with visibility "%s".'
    => '%s hat dieses Objekt mit der Sichtbarkeit „%s" erstellt.',
  '%s changed the visibility from "%s" to "%s".'
    => '%s hat die Sichtbarkeit von „%s" auf „%s" geändert.',
  '%s created this object with edit policy "%s".'
    => '%s hat dieses Objekt mit der Bearbeitungsrichtlinie „%s" erstellt.',
  '%s changed the edit policy from "%s" to "%s".'
    => '%s hat die Bearbeitungsrichtlinie von „%s" auf „%s" geändert.',
  '%s created this object with join policy "%s".'
    => '%s hat dieses Objekt mit der Beitrittsrichtlinie „%s" erstellt.',
  '%s changed the join policy from "%s" to "%s".'
    => '%s hat die Beitrittsrichtlinie von „%s" auf „%s" geändert.',
  '%s created this object with interact policy "%s".'
    => '%s hat dieses Objekt mit der Interaktionsrichtlinie „%s" erstellt.',
  '%s changed the interact policy from "%s" to "%s".'
    => '%s hat die Interaktionsrichtlinie von „%s" auf „%s" geändert.',
  '%s changed the interact policy for %s.'
    => '%s hat die Interaktionsrichtlinie für %s geändert.',
  '%s created this object in space %s.'
    => '%s hat dieses Objekt im Bereich %s erstellt.',
  '%s created %s in the %s space.'
    => '%s hat %s im Bereich %s erstellt.',
  '%s shifted this object from the %s space to the %s space.'
    => '%s hat dieses Objekt vom Bereich %s in den Bereich %s verschoben.',
  '%s shifted %s from the %s space to the %s space.'
    => '%s hat %s vom Bereich %s in den Bereich %s verschoben.',
  '%s subscribed.'   => '%s hat abonniert.',
  '%s unsubscribed.' => '%s hat das Abonnement beendet.',

  '%s attached %s referenced file(s): %s.'
    => '%s hat %s referenzierte Datei(en) angehängt: %s.',
  '%s updated %s attached file(s), added %s: %s; removed %s: %s; modified %s: '
  .'%s.'
    => '%s hat %s angehängte Datei(en) geändert, hinzugefügt %s: %s; entfernt %s: %s; geändert %s: %s.',
  '%s updated %s attached file(s), added %s: %s; removed %s: %s.'
    => '%s hat %s angehängte Datei(en) geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s updated %s attached file(s), added %s: %s; modified %s: %s.'
    => '%s hat %s angehängte Datei(en) geändert, hinzugefügt %s: %s; geändert %s: %s.',
  '%s updated %s attached file(s), removed %s: %s; modified %s: %s.'
    => '%s hat %s angehängte Datei(en) geändert, entfernt %s: %s; geändert %s: %s.',
  '%s removed %s attached file(s): %s.'
    => '%s hat %s angehängte Datei(en) entfernt: %s.',
  '%s modified %s attached file(s): %s.'
    => '%s hat %s angehängte Datei(en) geändert: %s.',
  '%s attached files...'
    => '%s hat Dateien angehängt...',

  '%s edited an edge.'
    => '%s hat eine Verknüpfungskante bearbeitet.',
  '%s edited edge metadata for %s.'
    => '%s hat Verknüpfungsmetadaten für %s bearbeitet.',
  '%s edited a custom field (with key "%s").'
    => '%s hat ein benutzerdefiniertes Feld (Schlüssel „%s") bearbeitet.',

  '%s marked %s inline comment(s) as done and %s inline comment(s) as not done.'
    => '%s hat %s Inline-Kommentar(e) als erledigt und %s Inline-Kommentar(e) als nicht erledigt markiert.',
  '%s marked %s inline comment(s) as done.'
    => '%s hat %s Inline-Kommentar(e) als erledigt markiert.',
  '%s marked %s inline comment(s) as not done.'
    => '%s hat %s Inline-Kommentar(e) als nicht erledigt markiert.',

  '%s moved this task from %s to %s on the %s board.'
    => '%s hat diese Aufgabe von %s nach %s auf der %s Arbeitsfläche verschoben.',
  '%s moved this task to %s on the %s board.'
    => '%s hat diese Aufgabe nach %s auf der %s Arbeitsfläche verschoben.',
  '%s moved this task on %s board(s): %s.'
    => '%s hat diese Aufgabe auf %s Arbeitsfläche(n) verschoben: %s.',
  '%s moved %s from %s to %s on the %s board.'
    => '%s hat %s von %s nach %s auf der %s Arbeitsfläche verschoben.',
  '%s moved %s to %s on the %s board.'
    => '%s hat %s nach %s auf der %s Arbeitsfläche verschoben.',
  '%s moved %s on %s board(s): %s.'
    => '%s hat %s auf %s Arbeitsfläche(n) verschoben: %s.',

  '%s signed these changes with MFA.'
    => '%s hat diese Änderungen mit MFA bestätigt.',
  '%s edited this object (transaction type "%s").'
    => '%s hat dieses Objekt bearbeitet (Transaktionstyp „%s").',
  '%s created an object: %s.'
    => '%s hat ein Objekt erstellt: %s.',

  '%s updated the description.'          => '%s hat die Beschreibung aktualisiert.',
  '%s updated the description for %s %s.'=> '%s hat die Beschreibung von %s %s aktualisiert.',
  '%s renamed this %s from %s to %s.'    => '%s hat %s von %s in %s umbenannt.',
  '%s created %s %s.'                    => '%s hat %s %s erstellt.',
  '%s renamed %s %s from %s to %s.'      => '%s hat %s %s von %s in %s umbenannt.',

  'CHANGES TO %s DESCRIPTION' => 'ÄNDERUNGEN AN DER %s BESCHREIBUNG',

  // Subscriber / watcher / contributor patterns
  '%s added %s subscriber(s): %s.'
    => '%s hat %s Mitleser hinzugefügt: %s.',
  '%s removed %s subscriber(s): %s.'
    => '%s hat %s Mitleser entfernt: %s.',
  '%s edited subscriber(s), added %s: %s; removed %s: %s.'
    => '%s hat Mitleser geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s added %s subscriber(s) for %s: %s.'
    => '%s hat %s Mitleser für %s hinzugefügt: %s.',
  '%s removed %s subscriber(s) for %s: %s.'
    => '%s hat %s Mitleser für %s entfernt: %s.',
  '%s edited subscriber(s) for %s, added %s: %s; removed %s: %s.'
    => '%s hat Mitleser für %s geändert, hinzugefügt %s: %s; entfernt %s: %s.',

  '%s added %s watcher(s): %s.'
    => '%s hat %s Beobachter hinzugefügt: %s.',
  '%s removed %s watcher(s): %s.'
    => '%s hat %s Beobachter entfernt: %s.',
  '%s edited watcher(s), added %s: %s; removed %s: %s.'
    => '%s hat Beobachter geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s added %s watcher(s) for %s: %s.'
    => '%s hat %s Beobachter für %s hinzugefügt: %s.',
  '%s removed %s watcher(s) for %s: %s.'
    => '%s hat %s Beobachter für %s entfernt: %s.',
  '%s edited watcher(s) for %s, added %s: %s; removed %s: %s.'
    => '%s hat Beobachter für %s geändert, hinzugefügt %s: %s; entfernt %s: %s.',

  '%s added %s contributor(s): %s.'
    => '%s hat %s Beitragenden hinzugefügt: %s.',
  '%s removed %s contributor(s): %s.'
    => '%s hat %s Beitragenden entfernt: %s.',
  '%s edited contributor(s), added %s: %s; removed %s: %s.'
    => '%s hat Beitragende geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s added %s contributor(s) for %s: %s.'
    => '%s hat %s Beitragenden für %s hinzugefügt: %s.',
  '%s removed %s contributor(s) for %s: %s.'
    => '%s hat %s Beitragenden für %s entfernt: %s.',
  '%s edited contributor(s) for %s, added %s: %s; removed %s: %s.'
    => '%s hat Beitragende für %s geändert, hinzugefügt %s: %s; entfernt %s: %s.',

  '%s added %s unsubscriber(s): %s.'
    => '%s hat %s Abbestellungen hinzugefügt: %s.',
  '%s removed %s unsubscriber(s): %s.'
    => '%s hat %s Abbestellungen entfernt: %s.',
  '%s edited unsubscriber(s), added %s: %s; removed %s: %s.'
    => '%s hat Abbestellungen geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s added %s unsubscriber(s) for %s: %s.'
    => '%s hat %s Abbestellungen für %s hinzugefügt: %s.',
  '%s removed %s unsubscriber(s) for %s: %s.'
    => '%s hat %s Abbestellungen für %s entfernt: %s.',
  '%s edited unsubscriber(s) for %s, added %s: %s; removed %s: %s.'
    => '%s hat Abbestellungen für %s geändert, hinzugefügt %s: %s; entfernt %s: %s.',

  // Form log messages
  '%s changed the order in which this form appears in the "Create" menu.'
    => '%s hat die Reihenfolge dieses Formulars im „Erstellen"-Menü geändert.',
  '%s changed locked and hidden fields.'
    => '%s hat gesperrte und ausgeblendete Felder geändert.',
  '%s changed the subtype of this form from %s to %s.'
    => '%s hat den Untertyp dieses Formulars von %s auf %s geändert.',
  '%s updated the preamble for this form.'
    => '%s hat die Einleitung dieses Formulars aktualisiert.',
  '%s marked this form as an edit form.'
    => '%s hat dieses Formular als Bearbeitungsformular markiert.',
  '%s unmarked this form as an edit form.'
    => '%s hat die Markierung als Bearbeitungsformular entfernt.',
  '%s changed the order in which this form appears in the "Edit" menu.'
    => '%s hat die Reihenfolge dieses Formulars im „Bearbeiten"-Menü geändert.',
  '%s added this form to the "Create" menu.'
    => '%s hat dieses Formular zum „Erstellen"-Menü hinzugefügt.',
  '%s removed this form from the "Create" menu.'
    => '%s hat dieses Formular aus dem „Erstellen"-Menü entfernt.',
  '%s disabled this form.'   => '%s hat dieses Formular deaktiviert.',
  '%s enabled this form.'    => '%s hat dieses Formular aktiviert.',
  '%s changed the default values for field %s.'
    => '%s hat die Standardwerte für Feld %s geändert.',
  '%s changed the default value for field %s.'
    => '%s hat den Standardwert für Feld %s geändert.',
  '%s renamed this form from %s to %s.'
    => '%s hat dieses Formular von %s in %s umbenannt.',
  '%s named this form %s.'   => '%s hat dieses Formular „%s" genannt.',
  '%s reordered the fields in this form.'
    => '%s hat die Felder in diesem Formular neu angeordnet.',
  '%s created this form.'    => '%s hat dieses Formular erstellt.',

  // -------------------------------------------------------------------------
  // Transaction validation / errors
  // -------------------------------------------------------------------------

  'Edit type (with key "%s") is missing a Conduit parameter type.'
    => 'Bearbeitungstyp (Schlüssel „%s") hat keinen Conduit-Parametertyp.',
  'EditEngine BuiltinKey contains an invalid key character "/".'
    => 'EditEngine-BuiltinKey enthält ein ungültiges Schlüsselzeichen „/".',
  'EditEngine ("%s") contains an invalid key character "/".'
    => 'EditEngine „%s" enthält ein ungültiges Schlüsselzeichen „/".',
  'Builtin Form "%s"'        => 'Integriertes Formular „%s"',
  'Untitled Form'            => 'Unbenanntes Formular',
  'Comment for this transaction was not loaded.'
    => 'Der Kommentar zu dieser Transaktion wurde nicht geladen.',
  'Transaction requires handles and it did not load them.'
    => 'Die Transaktion benötigt Handles, hat sie aber nicht geladen.',
  'Transaction (of type "%s") has no effect.'
    => 'Transaktion (Typ „%s") hat keine Wirkung.',
  'This %s already has that view policy.'    => 'Dieses %s hat diese Anzeigerichtlinie bereits.',
  'This %s already has that edit policy.'    => 'Dieses %s hat diese Bearbeitungsrichtlinie bereits.',
  'This %s already has that join policy.'    => 'Dieses %s hat diese Beitrittsrichtlinie bereits.',
  'This %s already has that interact policy.'=> 'Dieses %s hat diese Interaktionsrichtlinie bereits.',
  'This object is already in that space.'    => 'Dieses Objekt befindet sich bereits in diesem Bereich.',
  'Edges already exist; transaction has no effect.'
    => 'Verknüpfungskanten existieren bereits; Transaktion hat keine Wirkung.',
  'You have not moved this object to any columns it is not already in.'
    => 'Du hast dieses Objekt nicht in neue Spalten verschoben.',
  'You can not sign a transaction group that has no other effects.'
    => 'Du kannst keine Transaktionsgruppe ohne weitere Auswirkungen mit MFA bestätigen.',
  'Name for a %s can be no longer than %s characters.'
    => 'Ein Name für %s darf maximal %s Zeichen lang sein.',
  'Task has invalid task data.'     => 'Die Aufgabe hat ungültige Daten.',
  'Task has no object PHID!'        => 'Die Aufgabe hat keine Objekt-PHID!',
  'Unable to load object with PHID "%s"!'  => 'Objekt mit PHID „%s" konnte nicht geladen werden!',
  'Unable to load query for transaction object "%s"!'
    => 'Abfrage für Transaktionsobjekt „%s" konnte nicht geladen werden!',
  'Unable to load transactions: %s.'       => 'Transaktionen konnten nicht geladen werden: %s.',
  'Transactions have no effect:'           => 'Transaktionen haben keine Wirkung:',
  'Validation errors:'                     => 'Validierungsfehler:',
  'Validation Errors'                      => 'Validierungsfehler',
  'Transaction Summary'                    => 'Transaktionszusammenfassung',
  'EDIT DETAILS'                           => 'BEARBEITUNGSDETAILS',
  'Subtype "%s" is not a valid subtype.'   => 'Untertyp „%s" ist kein gültiger Untertyp.',
  'The subtype "%s" is not a valid subtype.' => 'Der Untertyp „%s" ist kein gültiger Untertyp.',
  'Subtype Key "%s"'                        => 'Untertyp-Schlüssel „%s"',
  'Subtype key "%s" does not identify a valid subtype.'
    => 'Untertyp-Schlüssel „%s" bezeichnet keinen gültigen Untertyp.',
  'No MFA'                                  => 'Kein MFA',
  'Capability not supported!'               => 'Funktion wird nicht unterstützt!',
  'Capability not supported.'               => 'Funktion wird nicht unterstützt.',
  'No herald adapter specified.'            => 'Kein Herald-Adapter angegeben.',
  'Failed to serialize() value for key "%s".'    => 'Fehler beim Serialisieren des Wertes für Schlüssel „%s".',
  'Failed to base64 encode value for key "%s".'  => 'Fehler beim Base64-Kodieren des Wertes für Schlüssel „%s".',
  'Failed to base64_decode() value for key "%s".'=> 'Fehler beim Base64-Dekodieren des Wertes für Schlüssel „%s".',
  'Edge transaction has no \'%s\'!'
    => 'Verknüpfungstransaktion hat kein „%s"!',
  'Transaction type \'%s\' is missing an internal apply implementation!'
    => 'Transaktionstyp „%s" hat keine interne Implementierung!',
  'Transaction type \'%s\' is missing an external apply implementation!'
    => 'Transaktionstyp „%s" hat keine externe Implementierung!',
  'Custom field transaction has no \'%s\'!'
    => 'Benutzerdefinierte Feldtransaktion hat kein „%s"!',
  'Transaction must have a PHID before calling %s!'
    => 'Die Transaktion muss vor dem Aufruf von %s eine PHID haben!',
  'Transaction comment must not yet have a PHID!'
    => 'Der Transaktionskommentar darf noch keine PHID haben!',
  'Transaction edge specification contains unexpected key "%s".'
    => 'Die Verknüpfungskanten-Spezifikation enthält einen unerwarteten Schlüssel „%s".',
  'You must choose a space for this object.'
    => 'Du musst einen Bereich für dieses Objekt auswählen.',
  'No object exists with ID "%s".'          => 'Es existiert kein Objekt mit der ID „%s".',
  'No object exists with PHID "%s".'        => 'Es existiert kein Objekt mit der PHID „%s".',
  'Monogram "%s" does not identify a valid object.'
    => 'Monogramm „%s" bezeichnet kein gültiges Objekt.',
  'This EditField does not provide a Conduit EditType with key "%s".'
    => 'Dieses EditField stellt keinen Conduit-EditType mit Schlüssel „%s" bereit.',
  'This EditField does not provide a Bulk EditType with key "%s".'
    => 'Dieses EditField stellt keinen Stapel-EditType mit Schlüssel „%s" bereit.',
  'No default edit engine configuration for bulk edit.'
    => 'Keine Standard-EditEngine-Konfiguration für die Stapelbearbeitung.',
  'Unsupported bulk edit type "%s".'        => 'Nicht unterstützter Stapelbearbeitungstyp „%s".',
  'Unable to load configuration for this EditEngine ("%s").'
    => 'Konfiguration für diese EditEngine („%s") konnte nicht geladen werden.',
  'Parameter "%s" is not a list of transactions.'
    => 'Parameter „%s" ist keine Transaktionsliste.',
  'Exception when processing transaction of type "%s": %s'
    => 'Ausnahme beim Verarbeiten der Transaktion vom Typ „%s": %s',
  'List of PHIDs to add.'    => 'Liste der hinzuzufügenden PHIDs.',
  'List of PHIDs to remove.' => 'Liste der zu entfernenden PHIDs.',
  'List of PHIDs to set.'    => 'Liste der zu setzenden PHIDs.',
  'You can not apply transactions which already have IDs/PHIDs!'
    => 'Du kannst keine Transaktionen mit bereits vorhandenen IDs/PHIDs anwenden!',
  'You can not apply transactions which already have %s!'
    => 'Du kannst keine Transaktionen anwenden, die bereits %s haben!',
  'This transaction is supposed to have an %s set, but it does not!'
    => 'Diese Transaktion sollte ein %s haben, hat es aber nicht!',
  'Editor ("%s") has no mail stamp template with provided key ("%s").'
    => 'Editor „%s" hat keine Mail-Stempel-Vorlage mit dem Schlüssel „%s".',

  // -------------------------------------------------------------------------
  // MFA messages
  // -------------------------------------------------------------------------

  'You must provide multi-factor credentials to comment or make changes, but '
  .'you do not have multi-factor authentication configured on your account.'
    => 'Du musst Mehrfaktor-Anmeldedaten angeben, um zu kommentieren oder Änderungen vorzunehmen. Dein Konto hat jedoch keine Mehrfaktor-Authentifizierung konfiguriert.',

  'To continue, configure multi-factor authentication in Settings.'
    => 'Um fortzufahren, konfiguriere Mehrfaktor-Authentifizierung in den Einstellungen.',

  'You will be required to provide multi-factor credentials to comment or make '
  .'changes.'
    => 'Du musst Mehrfaktor-Anmeldedaten angeben, um zu kommentieren oder Änderungen vorzunehmen.',

  'You will be required to provide multi-factor credentials to make changes.'
    => 'Du musst Mehrfaktor-Anmeldedaten angeben, um Änderungen vorzunehmen.',

  // -------------------------------------------------------------------------
  // Locks
  // -------------------------------------------------------------------------

  'Edit Locked Object'      => 'Gesperrtes Objekt bearbeiten',
  'This object is locked. Edit it anyway?' => 'Dieses Objekt ist gesperrt. Trotzdem bearbeiten?',
  'Override Lock'           => 'Sperre übergehen',
  'Object Locked'           => 'Objekt gesperrt',
  'You can not interact with this object because it is locked.'
    => 'Du kannst mit diesem Objekt nicht interagieren, weil es gesperrt ist.',
  'This object has been locked.' => 'Dieses Objekt wurde gesperrt.',
  'Conversation Locked'     => 'Konversation gesperrt',
  'Encryption Required'     => 'Verschlüsselung erforderlich',

  // -------------------------------------------------------------------------
  // Comments
  // -------------------------------------------------------------------------

  'This comment was removed by %s.'  => 'Dieser Kommentar wurde von %s entfernt.',
  'Remove Comment'                   => 'Kommentar entfernen',
  'Raw Comment'                      => 'Rohkommentar',
  'Email Body Text'                  => 'E-Mail-Nachrichtentext',
  'For full details, run `/bin/mail show-inbound --id %d`'
    => 'Für vollständige Details: `/bin/mail show-inbound --id %d`',
  'Comment to add, formatted as remarkup.' => 'Hinzuzufügender Kommentar, formatiert als Remarkup.',
  'Comment Preview'         => 'Kommentarvorschau',
  'Remove Action: %s'       => 'Aktion entfernen: %s',
  'Comment Action Options'  => 'Kommentaraktions-Optionen',

  // -------------------------------------------------------------------------
  // Mentions
  // -------------------------------------------------------------------------

  'Mention'    => 'Erwähnung',
  'Mention In' => 'Erwähnt in',
  'Mentioned In'  => 'Erwähnt in',
  'Mentioned Here'=> 'Hier erwähnt',
  'Mentioned User'=> 'Erwähnter Benutzer',
  'The source object has a comment which mentions the destination object.'
    => 'Das Quellobjekt hat einen Kommentar, der das Zielobjekt erwähnt.',
  'The source object is mentioned in a comment on the destination object.'
    => 'Das Quellobjekt wird in einem Kommentar des Zielobjektes erwähnt.',

  // -------------------------------------------------------------------------
  // Transaction visibility
  // -------------------------------------------------------------------------

  'Transactions are visible to users that can see the object which was acted '
  .'upon. Some transactions - in particular, comments - are editable by the '
  .'transaction author.'
    => 'Transaktionen sind für Benutzer sichtbar, die das betreffende Objekt sehen können. Einige Transaktionen – insbesondere Kommentare – können vom Autor der Transaktion bearbeitet werden.',

  'Comments are visible to users who can see the object which was commented on. '
  .'Comments can be edited by their authors.'
    => 'Kommentare sind für Benutzer sichtbar, die das kommentierte Objekt sehen können. Kommentare können von ihren Autoren bearbeitet werden.',

  // -------------------------------------------------------------------------
  // EditEngine forms UI
  // -------------------------------------------------------------------------

  'Edit Configuration'      => 'Konfiguration bearbeiten',
  'Edit Engines'            => 'Bearbeitungs-Engines',
  'All Edit Engines'        => 'Alle Bearbeitungs-Engines',
  'Forms'                   => 'Formulare',
  'Hide Create Forms'       => 'Erstellungsformulare ausblenden',
  'Show Only Create Forms'  => 'Nur Erstellungsformulare anzeigen',
  'Hide Edit Forms'         => 'Bearbeitungsformulare ausblenden',
  'Show Only Edit Forms'    => 'Nur Bearbeitungsformulare anzeigen',
  'All Forms'               => 'Alle Formulare',
  'Create Forms'            => 'Erstellungsformulare',
  'Edit Forms'              => 'Bearbeitungsformulare',
  'Default Create Form'     => 'Standard-Erstellungsformular',
  'Edit Form'               => 'Bearbeitungsformular',
  'Form %d'                 => 'Formular %d',
  'Browse Forms'            => 'Formulare durchsuchen',
  'Type a form name...'     => 'Formularnamen eingeben...',
  'Create Form'             => 'Erstellungsformular',
  'Type an object type name...' => 'Objekttypnamen eingeben...',
  '%s ("%s")'               => '%s („%s")',
  'Form name is required.'  => 'Ein Formularname ist erforderlich.',
  'Forms must have a name.' => 'Formulare müssen einen Namen haben.',
  'Configure Form'          => 'Formular konfigurieren',
  'View Form Configurations'=> 'Formularkonfigurationen anzeigen',
  'Edit Form Configuration' => 'Formularkonfiguration bearbeiten',
  'Using HTTP Parameters'   => 'HTTP-Parameter verwenden',
  'User Guide: Customizing Forms' => 'Benutzerhandbuch: Formulare anpassen',
  'HTTP Parameters'         => 'HTTP-Parameter',
  'HTTP Parameters: %s'     => 'HTTP-Parameter: %s',
  'No Default Create Forms' => 'Keine Standard-Erstellungsformulare',
  'No Create Permission'    => 'Keine Erstellungsberechtigung',
  'You do not have permission to create these objects.'
    => 'Du hast keine Berechtigung, diese Objekte zu erstellen.',
  'No Manage Permission'    => 'Keine Verwaltungsberechtigung',
  'No Edit Forms'           => 'Keine Bearbeitungsformulare',
  'Not an Edit Form'        => 'Kein Bearbeitungsformular',
  'Form Disabled'           => 'Formular deaktiviert',
  'This form ("%s") has been disabled, so it can not be used.'
    => 'Dieses Formular („%s") wurde deaktiviert und kann nicht verwendet werden.',
  'Enable Form'             => 'Formular aktivieren',
  'Disable Form'            => 'Formular deaktivieren',
  'Disable this form? Users will no longer be able to use it.'
    => 'Dieses Formular deaktivieren? Benutzer können es dann nicht mehr verwenden.',
  'Edit Form: %s'           => 'Formular bearbeiten: %s',
  'Make Editable'           => 'Bearbeitbar machen',
  'Use Form'                => 'Formular verwenden',
  'Change Default Values'   => 'Standardwerte ändern',
  'Change Field Order'      => 'Feldreihenfolge ändern',
  'Lock / Hide Fields'      => 'Felder sperren/ausblenden',
  'Change Form Subtype'     => 'Formular-Untertyp ändern',
  'Unmark as "Create" Form' => 'Markierung als „Erstellen"-Formular entfernen',
  'Mark as "Create" Form'   => 'Als „Erstellen"-Formular markieren',
  'Unmark as "Edit" Form'   => 'Markierung als „Bearbeiten"-Formular entfernen',
  'Mark as "Edit" Form'     => 'Als „Bearbeiten"-Formular markieren',
  'This is a preview of the current form configuration.'
    => 'Dies ist eine Vorschau der aktuellen Formularkonfiguration.',
  'Form Preview'            => 'Formularvorschau',
  'Unmark as Edit Form'     => 'Markierung als Bearbeitungsformular entfernen',
  'Unmark Form'             => 'Formularmarkierung entfernen',
  'Mark as Edit Form'       => 'Als Bearbeitungsformular markieren',
  'Mark Form'               => 'Formular markieren',
  'Already Editable'        => 'Bereits bearbeitbar',
  'This form configuration is already editable.' => 'Diese Formularkonfiguration ist bereits bearbeitbar.',
  'Make Builtin Editable'   => 'Integriertes Formular bearbeitbar machen',
  'Make this builtin form editable?' => 'Dieses integrierte Formular bearbeitbar machen?',
  'Unmark as Create Form'   => 'Markierung als Erstellungsformular entfernen',
  'Mark as Create Form'     => 'Als Erstellungsformular markieren',
  'Reorder Create Forms'    => 'Erstellungsformulare neu sortieren',
  'Save Create Order'       => 'Erstellen-Reihenfolge speichern',
  'Reorder Edit Forms'      => 'Bearbeitungsformulare neu sortieren',
  'Save Edit Order'         => 'Bearbeiten-Reihenfolge speichern',
  'Edit Form Defaults'      => 'Formular-Standardwerte bearbeiten',
  'Save Defaults'           => 'Standardwerte speichern',
  'You are editing the default values for this form.'
    => 'Du bearbeitest die Standardwerte für dieses Formular.',
  'Edit Defaults'           => 'Standardwerte bearbeiten',
  'Form Order'              => 'Formularreihenfolge',
  'Reorder Fields'          => 'Felder neu anordnen',
  'Drag and drop fields to reorder them.' => 'Felder per Drag & Drop neu anordnen.',

  // Form configuration management
  'Edit Configurations'     => 'Konfigurationen bearbeiten',
  'Configure Forms for Configuring Forms'
    => 'Formulare zur Formularkonfiguration konfigurieren',
  'Create New Form'         => 'Neues Formular erstellen',
  'Edit Form %d: %s'        => 'Formular %d bearbeiten: %s',
  'Name of the form.'       => 'Name des Formulars.',
  'Optional instructions, shown above the form.'
    => 'Optionale Anweisungen, die über dem Formular angezeigt werden.',

  // -------------------------------------------------------------------------
  // Bulk edit
  // -------------------------------------------------------------------------

  'Bulk Editor'             => 'Stapel-Editor',
  'Bulk Edit'               => 'Stapelbearbeitung',
  'Bulk Edit Actions'       => 'Stapelbearbeitungsaktionen',
  'Working Set'             => 'Arbeitsmenge',
  'Add Another Action'      => 'Weitere Aktion hinzufügen',
  'Add Action...'           => 'Aktion hinzufügen...',
  'Expected a query key or a set of query constraints.'
    => 'Ein Abfrageschlüssel oder eine Menge von Abfragebeschränkungen wurde erwartet.',
  'Query does not match any objects.'
    => 'Die Abfrage liefert keine Ergebnisse.',
  'Query does not match any objects you have permission to edit.'
    => 'Die Abfrage liefert keine Objekte, die Du bearbeiten darfst.',
  'You have not selected any objects to edit.'
    => 'Du hast keine Objekte zur Bearbeitung ausgewählt.',
  'You have not chosen any edits to apply.'
    => 'Du hast keine Bearbeitungen zum Anwenden ausgewählt.',
  'Primary Fields'          => 'Primärfelder',
  'Support Applications'    => 'Hilfsprogramme',
  '%s Action(s) With No Effect'   => '%s Aktion(en) ohne Wirkung',
  '%s of your actions have no effect:' => '%s Deiner Aktionen haben keine Wirkung:',
  'Apply remaining actions?' => 'Verbleibende Aktionen anwenden?',
  'Apply Remaining Actions' => 'Verbleibende Aktionen anwenden',
  'The %s action(s) you are taking have no effect:'
    => 'Die %s Aktion(en), die Du durchführst, haben keine Wirkung:',
  '%s Action(s) Have No Effect' => '%s Aktion(en) haben keine Wirkung',

  'You are about to apply a bulk edit which will affect %s object(s).'
    => 'Du bist dabei, eine Stapelbearbeitung anzuwenden, die %s Objekt(e) betrifft.',

  'If you start work now, this edit will be applied silently: it will not send '
  .'mail or publish notifications.'
    => 'Wenn Du jetzt startest, wird diese Bearbeitung still angewendet: Es werden keine E-Mails gesendet oder Benachrichtigungen veröffentlicht.',

  'If you start work now, this edit will send mail and publish notifications '
  .'normally.'
    => 'Wenn Du jetzt startest, werden E-Mails gesendet und Benachrichtigungen normal veröffentlicht.',

  'To silence this edit, run this command:'
    => 'Um diese Bearbeitung zu stillen, diesen Befehl ausführen:',
  'After running this command, reload this page to see the new setting.'
    => 'Nach dem Ausführen dieses Befehls die Seite neu laden, um die neue Einstellung zu sehen.',
  'Configure a bulk job to execute silently.'
    => 'Einen Stapeljob zum stillen Ausführen konfigurieren.',
  'Use "--id" to choose a bulk job to make silent.'
    => '„--id" verwenden, um einen Stapeljob auszuwählen, der still ausgeführt werden soll.',
  'Unable to load bulk job with ID "%s".'
    => 'Stapeljob mit der ID „%s" konnte nicht geladen werden.',
  'This job is already configured to run silently.'
    => 'Dieser Job ist bereits zum stillen Ausführen konfiguriert.',
  'Configured job "%s" to run silently.'
    => 'Job „%s" wurde zum stillen Ausführen konfiguriert.',

  // -------------------------------------------------------------------------
  // Export CLI
  // -------------------------------------------------------------------------

  'Export data to a flat file (JSON, CSV, Excel, etc.).'
    => 'Daten in eine flache Datei exportieren (JSON, CSV, Excel usw.).',
  'SearchEngine class to export data from.'
    => 'SearchEngine-Klasse, aus der Daten exportiert werden sollen.',
  'Export format.'                          => 'Exportformat.',
  'Export the data selected by one or more queries.'
    => 'Die durch eine oder mehrere Abfragen ausgewählten Daten exportieren.',
  'Write output to a file. If omitted, output will be sent to stdout.'
    => 'Ausgabe in eine Datei schreiben. Ohne Angabe wird auf stdout ausgegeben.',
  'If the output file already exists, overwrite it instead of raising an error.'
    => 'Wenn die Ausgabedatei bereits existiert, wird sie überschrieben statt einen Fehler zu melden.',
  'Specify an export format with "--format".'
    => 'Ein Exportformat mit „--format" angeben.',
  'Unknown export format ("%s"). Known formats are: %s.'
    => 'Unbekanntes Exportformat („%s"). Bekannte Formate sind: %s.',
  'Export format ("%s") is not enabled.'
    => 'Exportformat „%s" ist nicht aktiviert.',
  'Use "--output <path>" to specify an output file, or "--output -" to '
  .'print to stdout.'
    => '„--output <Pfad>" für eine Ausgabedatei angeben oder „--output -" für die Ausgabe auf stdout.',
  'Flag "--overwrite" has no effect when outputting to stdout.'
    => 'Die Option „--overwrite" hat bei der Ausgabe auf stdout keine Wirkung.',
  'Output path already exists. Use "--overwrite" to overwrite it.'
    => 'Der Ausgabepfad existiert bereits. „--overwrite" verwenden, um zu überschreiben.',
  'export'                                  => 'export',
  'Exported data to "%s".'                  => 'Daten nach „%s" exportiert.',
  'Specify one or more queries to export with "--query".'
    => 'Eine oder mehrere Abfragen mit „--query" zum Exportieren angeben.',
  'Multiple search engines match "%s": %s.' => 'Mehrere Suchmaschinen passen zu „%s": %s.',
  'Query "%s" is not a recognized query for class "%s".'
    => 'Abfrage „%s" ist keine bekannte Abfrage für Klasse „%s".',
  'SearchEngine class ("%s") does not support data export.'
    => 'SearchEngine-Klasse „%s" unterstützt keinen Datenexport.',
  'Specify an export format with "--format".'
    => 'Ein Exportformat mit „--format" angeben.',

  // -------------------------------------------------------------------------
  // Various UI strings
  // -------------------------------------------------------------------------

  'Detached'                => 'Getrennt',
  'Old Mode'                => 'Alter Modus',
  'New Mode'                => 'Neuer Modus',
  'Via Content Source'      => 'Über Inhaltsquelle',
  'Silent Edit'             => 'Stille Bearbeitung',
  'New Object'              => 'Neues Objekt',
  'Recipient Removed'       => 'Empfänger entfernt',
  'Change the object subtype.'  => 'Objekt-Untertyp ändern.',
  'New object subtype key.'     => 'Neuer Objekt-Untertyp-Schlüssel.',
  'Change Subtype'          => 'Untertyp ändern',
  'Object Monogram'         => 'Objekt-Monogramm',
  'Engine: Editor'          => 'Engine: Editor',
  'Engine: Edit'            => 'Engine: Bearbeiten',
  'Make comments.'          => 'Kommentare hinzufügen.',
  'Method Details'          => 'Methoden-Details',
  '<empty>'                 => '(leer)',
  'This object has no fields with aliases.'
    => 'Dieses Objekt hat keine Felder mit Aliasen.',
  'None of the fields on this object support templating.'
    => 'Keines der Felder dieses Objektes unterstützt Vorlagen.',
  'Will Copy'               => 'Wird kopiert',
  'This object has no select fields.'
    => 'Dieses Objekt hat keine Auswahlfelder.',
  'Warnings'                => 'Warnungen',
  'This comment was removed by %s.' => 'Dieser Kommentar wurde von %s entfernt.',
  '🔒 Locked'               => '🔒 Gesperrt',
  '✘ Hidden'                => '✘ Ausgeblendet',
  'Create %s'               => '%s erstellen',
  'Take Action'             => 'Aktion ausführen',
  '!%s (or %s)'             => '!%s (oder %s)',

  // -------------------------------------------------------------------------
  // Miscellaneous
  // -------------------------------------------------------------------------

  'No Default Create Forms'       => 'Keine Standard-Erstellungsformulare',
  'None of the fields on this object support templating.'
    => 'Keines der Felder dieses Objektes unterstützt Vorlagen.',
  '%s created this form.'         => '%s hat dieses Formular erstellt.',
  'Form name is required.'        => 'Ein Formularname ist erforderlich.',
  'Forms must have a name.'       => 'Formulare müssen einen Namen haben.',

];
