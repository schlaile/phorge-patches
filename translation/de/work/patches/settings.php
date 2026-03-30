<?php

// German translations for the settings application.
// Covers: missing entries + corrected fuzzy matches.

return [

  // --- Navigation / panel titles ---

  'Global Default Settings'  => 'Globale Standardeinstellungen',
  'Personal Settings'        => 'Persönliche Einstellungen',
  'Personal Account Settings'=> 'Persönliche Kontoeinstellungen',
  'Global Defaults'          => 'Globale Standardwerte',
  'Create Global Defaults'   => 'Globale Standardwerte erstellen',
  'Edit Global Settings'     => 'Globale Einstellungen bearbeiten',
  'Extra Settings'           => 'Zusätzliche Einstellungen',
  'Edit Settings Configurations' => 'Einstellungskonfigurationen bearbeiten',
  'This engine is used to edit settings.' => 'Diese Engine dient zum Bearbeiten von Einstellungen.',
  'No settings panels are available.'     => 'Keine Einstellungsseiten verfügbar.',
  'No settings panel group with key "%s" exists!' => 'Keine Einstellungsgruppe mit dem Schlüssel „%s" vorhanden!',
  'There is no known application setting with key "%s".' => 'Es gibt keine bekannte Anwendungseinstellung mit dem Schlüssel „%s".',
  'Edit global default settings for all users.'    => 'Globale Standardeinstellungen für alle Benutzer bearbeiten.',
  'Edit settings for your personal account.'       => 'Einstellungen für Dein persönliches Konto bearbeiten.',
  'Create Settings'  => 'Einstellungen erstellen',
  'Edit Settings: %s'=> 'Einstellungen bearbeiten: %s',

  // Settings %d — used for pagination / multiple settings pages
  'Settings %d' => 'Einstellungen %d',

  // --- Search ---

  'Search Scope' => 'Suchbereich',
  'Choose the default behavior of the global search in the main menu.'
    => 'Standardverhalten der globalen Suche im Hauptmenü festlegen.',

  // --- Timezone ---

  'Select your local timezone.' => 'Lokale Zeitzone auswählen.',
  'Timezone "%s" is not a valid timezone identifier.'
    => 'Zeitzone „%s" ist kein gültiger Zeitzonenbezeichner.',
  'UTC%+d:%02d' => 'UTC%+d:%02d',
  'UTC%+d'      => 'UTC%+d',
  'Timezone Ignored Offset' => 'Ignorierter Zeitzonenversatz',
  'Timezone Calibrated'     => 'Zeitzone kalibriert',
  'Adjust Timezone'         => 'Zeitzone anpassen',
  'Ignore new setting and keep %s' => 'Neue Einstellung ignorieren und %s beibehalten',
  'You can change your date and time preferences in Settings.'
    => 'Datum- und Zeiteinstellungen können unter Einstellungen angepasst werden.',

  'Your browser timezone (%s) differs from your profile timezone (%s). You can '
  .'adjust your profile setting to match your browser, or ignore this conflict '
  .'to keep your current profile setting.'
    => 'Die Browser-Zeitzone (%s) weicht von der Profil-Zeitzone (%s) ab. Du kannst '
      .'die Profileinstellung an den Browser anpassen oder den Konflikt ignorieren, '
      .'um die aktuelle Profileinstellung beizubehalten.',

  'The conflict between your browser and profile timezone settings will be '
  .'ignored.'
    => 'Der Konflikt zwischen Browser- und Profil-Zeitzone wird ignoriert.',

  'Ignore Conflict'  => 'Konflikt ignorieren',
  'Conflict Ignored' => 'Konflikt ignoriert',
  'Current Setting'  => 'Aktuelle Einstellung',
  'New Setting'      => 'Neue Einstellung',

  // --- Date format ---

  'Select the format you prefer for editing dates.'
    => 'Format für die Eingabe von Datumsangaben auswählen.',
  'ISO 8601: 2000-02-28' => 'ISO 8601: 2000-02-28',
  'US: 2/28/2000'        => 'US: 2/28/2000',
  // 'Europe: 28-02-2000' — fuzzy match "Europäisch (28-02-2000)" is correct, defuzz only

  // --- Time format ---

  'Time Format' => 'Zeitformat',
  'Select the format you prefer for editing and displaying time.'
    => 'Format für die Anzeige und Eingabe von Uhrzeiten auswählen.',
  // '12 Hour, 2:34 PM' — fuzzy match "12-Stunden (2:34 PM)" is correct, defuzz only
  // '24 Hour, 14:34'   — fuzzy match "24-Stunden (14:34)" is correct, defuzz only

  // --- Display / fonts ---

  'Monospaced Font'     => 'Monospace-Schrift',
  'Monospaced Textareas'=> 'Monospace-Textfelder',
  'Use Variable-Width Font' => 'Proportionale Schrift verwenden',
  'Use Monospaced Font'     => 'Monospace-Schrift verwenden',

  'You can choose to use either a monospaced or variable-width font in '
  .'textareas in the UI. Textareas are used for editing descriptions and writing '
  .'comments, among other things.'
    => 'In Textfeldern der Oberfläche kann entweder eine Monospace- oder eine '
      .'proportionale Schrift verwendet werden. Textfelder werden u. a. zum '
      .'Bearbeiten von Beschreibungen und zum Schreiben von Kommentaren genutzt.',

  'You can customize the font used when showing monospaced text, including '
  .'source code. You should enter a valid CSS font declaration like: `13px Consolas`'
    => 'Die Schrift für Monospace-Darstellungen (z. B. Quellcode) kann angepasst werden. '
      .'Gib eine gültige CSS-Schriftdeklaration ein, zum Beispiel: `13px Consolas`',

  'Monospaced font value "%s" is unsafe. You may only enter letters, numbers, '
  .'spaces, commas, periods, hyphens, forward slashes, and double quotes'
    => 'Der Monospace-Schriftwert „%s" ist nicht zulässig. Erlaubt sind nur '
      .'Buchstaben, Ziffern, Leerzeichen, Kommas, Punkte, Bindestriche, '
      .'Schrägstriche und Anführungszeichen.',

  'If you have difficulty reading the UI, this setting may help.'
    => 'Wenn die Benutzeroberfläche schwer lesbar ist, kann diese Einstellung helfen.',

  // --- Page titles ---

  'Use Unicode Glyphs: ⚙' => 'Unicode-Symbole: ⚙',
  'Use Plain Text: [Differential]' => 'Nur Text: [Differential]',

  'Some applications use unicode glyphs in page titles to provide a compact '
  .'representation of the current application. You can substitute plain text '
  .'instead if these glyphs do not display on your system.'
    => 'Einige Anwendungen verwenden Unicode-Symbole in Seitentiteln als kompakte '
      .'Darstellung der aktuellen Anwendung. Falls diese Symbole auf Deinem System '
      .'nicht korrekt angezeigt werden, kann stattdessen reiner Text verwendet werden.',

  // --- Diffs ---

  'Show Unified Diffs' => 'Unified Diffs anzeigen',
  'On Small Screens'   => 'Auf kleinen Bildschirmen',

  'Diffs are normally shown in a side-by-side layout on large screens and '
  .'automatically switched to a unified view on small screens (like mobile '
  .'phones). If you prefer unified diffs even on large screens, you can select '
  .'them for use on all displays.'
    => 'Diffs werden auf großen Bildschirmen normalerweise nebeneinander angezeigt '
      .'und auf kleinen Bildschirmen (z. B. Mobiltelefonen) automatisch in eine '
      .'einheitliche Ansicht umgeschaltet. Wer Unified Diffs auch auf großen '
      .'Bildschirmen bevorzugt, kann sie für alle Anzeigen aktivieren.',

  // --- Inline comments ---

  'Show Older Inlines' => 'Ältere Inline-Kommentare anzeigen',

  'When a revision is updated, this software attempts to bring inline comments '
  .'on the older version forward to the new changes. You can disable this '
  .'behavior if you prefer comments stay anchored in one place.'
    => 'Wenn eine Revision aktualisiert wird, versucht Phorge, Inline-Kommentare '
      .'der älteren Version auf die neuen Änderungen zu übertragen. Dieses '
      .'Verhalten kann deaktiviert werden, wenn Kommentare an ihrem ursprünglichen '
      .'Ort bleiben sollen.',

  // --- Language ---

  'Choose which language you would like the UI to use.'
    => 'Sprache der Benutzeroberfläche auswählen.',
  'Limited Translations'      => 'Eingeschränkte Übersetzungen',
  'Silly Translations'        => 'Spaß-Übersetzungen',
  'Developer/Test Translations'=> 'Entwickler-/Test-Übersetzungen',

  // --- Calendar / week ---

  'Choose which day a calendar week should begin on.'
    => 'Ersten Wochentag im Kalender festlegen.',

  // --- Pronoun ---

  'Pronoun' => 'Pronomen',
  'Choose the pronoun you prefer.' => 'Bevorzugtes Pronomen auswählen.',

  // --- Notifications (desktop / web) ---

  'Web Only'        => 'Nur Web',
  'Web and Desktop' => 'Web und Desktop',
  'Desktop Only'    => 'Nur Desktop',
  'No Notifications'=> 'Keine Benachrichtigungen',
  'Save Preference' => 'Einstellung speichern',
  'Send Test Notification' => 'Test-Benachrichtigung senden',

  'The dialog asking for permission to send desktop notifications was closed '
  .'without granting permission. Only application notifications will be sent.'
    => 'Der Dialog zum Erteilen der Berechtigung für Desktop-Benachrichtigungen wurde '
      .'ohne Bestätigung geschlossen. Es werden nur Anwendungsbenachrichtigungen gesendet.',

  'Permission for desktop notifications was denied. Only application '
  .'notifications will be sent.'
    => 'Die Berechtigung für Desktop-Benachrichtigungen wurde verweigert. '
      .'Es werden nur Anwendungsbenachrichtigungen gesendet.',

  'This web browser does not support desktop notifications. Only application '
  .'notifications will be sent for this browser regardless of this preference.'
    => 'Dieser Webbrowser unterstützt keine Desktop-Benachrichtigungen. '
      .'Unabhängig von dieser Einstellung werden für diesen Browser nur '
      .'Anwendungsbenachrichtigungen gesendet.',

  'Your browser has not yet granted this server permission to send desktop '
  .'notifications.'
    => 'Dieser Browser hat dem Server noch keine Berechtigung zum Senden von '
      .'Desktop-Benachrichtigungen erteilt.',

  'Your browser has granted this server permission to send desktop '
  .'notifications.'
    => 'Dieser Browser hat dem Server die Berechtigung zum Senden von '
      .'Desktop-Benachrichtigungen erteilt.',

  'This browser has denied permission to send desktop notifications to this '
  .'server. Consult your browser settings / documentation to figure out how to '
  .'clear this setting, do so, and then re-visit this page to grant permission.'
    => 'Dieser Browser hat die Berechtigung für Desktop-Benachrichtigungen verweigert. '
      .'Bitte prüfe die Browsereinstellungen oder die Dokumentation, um diese '
      .'Einstellung zurückzusetzen, und lade diese Seite anschließend neu, um die '
      .'Berechtigung zu erteilen.',

  'This server can send real-time notifications to your web browser or to your '
  .'desktop. Select where you want to receive these real-time updates.'
    => 'Dieser Server kann Echtzeit-Benachrichtigungen an den Webbrowser oder den '
      .'Desktop senden. Hier kann ausgewählt werden, wo diese Benachrichtigungen '
      .'empfangen werden sollen.',

  'Click "Save Preference" to persist these changes.'
    => 'Auf „Einstellung speichern" klicken, um die Änderungen zu übernehmen.',

  // --- Conpherence ---

  'Conpherence Column Visible'  => 'Conpherence-Spalte sichtbar',
  'Conpherence Column Minimize' => 'Conpherence-Spalte minimieren',
  'Conpherence Widget Pane Visible' => 'Conpherence-Widget sichtbar',
  'Conpherence Notifications'   => 'Conpherence-Benachrichtigungen',
  'Conpherence Sound'           => 'Conpherence-Töne',
  'Send Notifications'          => 'Benachrichtigungen senden',
  'No Sounds'                   => 'Keine Töne',
  'All Messages'                => 'Alle Nachrichten',

  'Choose the default notification behavior for Conpherence rooms.'
    => 'Standard-Benachrichtigungsverhalten für Conpherence-Räume festlegen.',
  'Choose the default sound behavior for new Conpherence rooms.'
    => 'Standard-Töneverhalten für neue Conpherence-Räume festlegen.',

  // --- DarkConsole ---

  'DarkConsole'         => 'Dunkle™-Konsole',
  'DarkConsole Tab'     => 'Dunkle™-Konsole-Tab',
  'DarkConsole Visible' => 'Dunkle™-Konsole sichtbar',

  'DarkConsole is a debugging console for developing and troubleshooting '
  .'applications. After enabling DarkConsole, press the {nav `} key on your '
  .'keyboard to toggle it on or off.'
    => 'Die Dunkle™-Konsole ist eine Debugging-Konsole für Entwicklung und '
      .'Fehleranalyse. Nach dem Aktivieren kann sie mit der Taste {nav `} '
      .'ein- und ausgeblendet werden.',

  // --- E-Mail notifications ---

  'Enable Email Notifications'  => 'E-Mail-Benachrichtigungen aktivieren',
  'Disable Email Notifications' => 'E-Mail-Benachrichtigungen deaktivieren',

  'If you disable **Email Notifications**, this server will never send email to '
  ."notify you about events. This preference overrides all your other settings.\n"
  ."\n"
  .'//You will still receive some administrative email, like password reset '
  .'email.//'
    => 'Wenn **E-Mail-Benachrichtigungen** deaktiviert sind, sendet dieser Server '
      ."keine Benachrichtigungs-E-Mails mehr. Diese Einstellung überschreibt alle anderen.\n"
      ."\n"
      .'//Bestimmte administrative E-Mails, z. B. zum Zurücksetzen des Passworts, '
      .'werden weiterhin gesendet.//',

  // --- Self Actions ---

  'Enable Self Action Mail'  => 'E-Mails bei eigenen Aktionen aktivieren',
  'Disable Self Action Mail' => 'E-Mails bei eigenen Aktionen deaktivieren',

  'If you disable **Self Actions**, this server will not notify you about '
  .'actions you take.'
    => 'Wenn **Eigene Aktionen** deaktiviert sind, wirst Du nicht mehr über '
      .'Aktionen benachrichtigt, die Du selbst durchgeführt hast.',

  // --- Vary Subjects ---

  'Vary Subjects'        => 'Betreffs variieren',
  'Enable Vary Subjects' => 'Unterschiedliche Betreffs aktivieren',
  'Disable Vary Subjects'=> 'Unterschiedliche Betreffs deaktivieren',

  'With **Vary Subjects** enabled, most mail subject lines will include a brief '
  ."description of their content, like `[Closed]` for a notification about "
  ."someone closing a task.\n"
  ."\n"
  ."| Setting              | Example Mail Subject\n"
  ."|----------------------|----------------\n"
  ."| Vary Subjects        | `[Maniphest] [Closed] T123: Example Task`\n"
  ."| Do Not Vary Subjects | `[Maniphest] T123: Example Task`\n"
  ."\n"
  .'This can make mail more useful, but some clients have difficulty threading '
  .'these messages. Disabling this option may improve threading at the cost of '
  .'making subject lines less useful.'
    => 'Mit aktivierten **Betreffs variieren** enthalten die meisten E-Mail-Betreffs '
      ."eine kurze Inhaltsbeschreibung, z. B. `[Geschlossen]` bei der Benachrichtigung "
      ."über eine geschlossene Aufgabe.\n"
      ."\n"
      ."| Einstellung            | Beispiel-Betreff\n"
      ."|------------------------|----------------\n"
      ."| Betreffs variieren     | `[Maniphest] [Geschlossen] T123: Beispielaufgabe`\n"
      ."| Betreffs nicht variieren | `[Maniphest] T123: Beispielaufgabe`\n"
      ."\n"
      .'Dies macht E-Mails nützlicher, kann aber das Threading in manchen Clients '
      .'beeinträchtigen. Das Deaktivieren dieser Option kann das Threading verbessern, '
      .'macht Betreffzeilen jedoch weniger aussagekräftig.',

  // --- Re: Prefix ---

  'Add "Re:" Prefix'     => '"Re:"-Präfix hinzufügen',
  'Enable "Re:" Prefix'  => '"Re:"-Präfix aktivieren',
  'Disable "Re:" Prefix' => '"Re:"-Präfix deaktivieren',

  'The **Add "Re:" Prefix** setting adds "Re:" in front of all messages, '
  .'even if they are not replies. If you use **Mail.app** on Mac OS X, this may '
  ."improve mail threading.\n"
  ."\n"
  ."| Setting                | Example Mail Subject\n"
  ."|------------------------|----------------\n"
  .'| Enable "Re:" Prefix  | `Re: [Differential] [Accepted] D123: Example '
  ."Revision`\n"
  .'| Disable "Re:" Prefix | `[Differential] [Accepted] D123: Example Revision`'
    => 'Die Einstellung **"Re:"-Präfix hinzufügen** setzt „Re:" vor alle Nachrichten, '
      .'auch wenn es keine Antworten sind. Dies kann das Threading in **Mail.app** '
      ."unter Mac OS X verbessern.\n"
      ."\n"
      ."| Einstellung              | Beispiel-Betreff\n"
      ."|--------------------------|----------------\n"
      .'| „Re:"-Präfix aktivieren  | `Re: [Differential] [Akzeptiert] D123: Beispiel`'
      ."\n"
      .'| „Re:"-Präfix deaktivieren | `[Differential] [Akzeptiert] D123: Beispiel`',

  // --- E-Mail format / stamps ---

  'HTML Email'         => 'HTML-E-Mail',
  'Send HTML Email'    => 'HTML-E-Mail senden',
  'Send Plain Text Email' => 'Nur-Text-E-Mail senden',
  'Email Format'       => 'E-Mail-Format',
  'Email Delivery'     => 'E-Mail-Zustellung',
  'Send Stamps'        => 'Stempel senden',
  'Mail Headers'       => 'Mail-Header',
  'Mail Headers and Body' => 'Mail-Header und -Text',

  'You can opt to receive plain text email instead of HTML email. Plain text '
  .'email works better with some clients.'
    => 'Statt HTML-E-Mails können auch Nur-Text-E-Mails empfangen werden. '
      .'Für manche E-Mail-Clients funktioniert das besser.',

  // --- Application settings matrix ---

  '⚫ Email'    => '⚫ E-Mail',
  '◐ Notify'   => '◐ Benachrichtigen',
  '⚪ Ignore'  => '⚪ Ignorieren',

  "You can adjust **Application Settings** here to customize when you are "
  ."emailed and notified.\n"
  ."\n"
  ."| Setting | Effect\n"
  ."| ------- | -------\n"
  ."| Email | You will receive an email and a notification, but the notification "
  ."will be marked \"read\".\n"
  ."| Notify | You will receive an unread notification only.\n"
  ."| Ignore | You will receive nothing.\n"
  ."\n"
  ."\n"
  ."If an update makes several changes (like adding CCs to a task, closing it, "
  ."and adding a comment) you will receive the strongest notification any of the "
  ."changes is configured to deliver.\n"
  ."\n"
  ."These preferences **only** apply to objects you are connected to (for "
  ."example, Revisions where you are a reviewer or tasks you are CC'd on). To "
  ."receive email alerts when other objects are created, configure [[ /herald/ | "
  ."Herald Rules ]]."
    => "Unter **Anwendungseinstellungen** lässt sich festlegen, wann E-Mails und "
      ."Benachrichtigungen gesendet werden.\n"
      ."\n"
      ."| Einstellung | Wirkung\n"
      ."| ----------- | -------\n"
      ."| E-Mail | Du erhältst eine E-Mail und eine Benachrichtigung, "
      ."die als 'gelesen' markiert wird.\n"
      ."| Benachrichtigen | Du erhältst nur eine ungelesene Benachrichtigung.\n"
      ."| Ignorieren | Du erhältst nichts.\n"
      ."\n"
      ."\n"
      ."Wenn eine Aktualisierung mehrere Änderungen enthält (z. B. CCs hinzufügen, "
      ."Aufgabe schließen und Kommentar verfassen), erhältst Du die stärkste "
      ."Benachrichtigung, die für eine der Änderungen konfiguriert ist.\n"
      ."\n"
      ."Diese Einstellungen gelten **nur** für Objekte, mit denen Du verbunden bist "
      ."(z. B. Revisionen, bei denen Du Prüfer bist, oder Aufgaben, für die Du "
      ."als CC eingetragen bist). Um E-Mail-Benachrichtigungen über neu erstellte "
      ."Objekte zu erhalten, konfiguriere [[ /herald/ | "
      ."Herald-Regeln ]].",

  // --- Default setting values ---

  'Default (%s)'              => 'Standard (%s)',
  'Default (Unknown, "%s")'   => 'Standard (Unbekannt, „%s")',
  'Value "%s" is not valid for setting "%s": valid values are %s.'
    => 'Der Wert „%s" ist für die Einstellung „%s" ungültig: gültige Werte sind %s.',
  'Empty string is not a valid setting for "%s".'
    => 'Ein leerer Wert ist für die Einstellung „%s" nicht gültig.',

  // --- File tree ---

  'Filetree Visible' => 'Dateibaum sichtbar',
  'Filetree Width'   => 'Dateibaum-Breite',

  // --- Policy ---

  'Policy Favorites' => 'Bevorzugte Richtlinien',

  // --- MFA / Authentication ---

  'Multi-Factor Auth'     => 'Mehrfaktor-Authentifizierung',
  'Authentication Factors'=> 'Authentifizierungsfaktoren',
  'Add Auth Factor'       => 'Authentifizierungsfaktor hinzufügen',
  'Add Authentication Factor' => 'Authentifizierungsfaktor hinzufügen',
  'Edit Authentication Factor'   => 'Authentifizierungsfaktor bearbeiten',
  'Delete Authentication Factor' => 'Authentifizierungsfaktor löschen',
  'Remove Factor' => 'Faktor entfernen',
  'No MFA Providers' => 'Keine MFA-Anbieter',
  'Choose Factor Type' => 'Faktortyp auswählen',
  'Provider: %s' => 'Anbieter: %s',
  'Identity' => 'Identität',
  'HiSec'    => 'HiSec',

  'Authentication factors must have a name to identify them.'
    => 'Authentifizierungsfaktoren müssen einen Namen zur Identifikation haben.',
  'Really remove the authentication factor %s from your account?'
    => 'Den Authentifizierungsfaktor %s wirklich aus Deinem Konto entfernen?',
  'You haven\'t added any authentication factors to your account yet.'
    => 'Du hast noch keine Authentifizierungsfaktoren zu Deinem Konto hinzugefügt.',

  'This install does not have any active MFA providers configured. At least one '
  .'provider must be configured and active before you can add new MFA factors.'
    => 'Diese Installation hat keine aktiven MFA-Anbieter konfiguriert. Mindestens '
      .'ein Anbieter muss konfiguriert und aktiv sein, bevor neue MFA-Faktoren '
      .'hinzugefügt werden können.',

  'NOTE: You already have an Auth Factor configured. Adding another factor will '
  .'require you to always provide all Auth Factors instead of selecting one of '
  .'your Auth Factors.'
    => 'HINWEIS: Du hast bereits einen Authentifizierungsfaktor konfiguriert. '
      .'Das Hinzufügen eines weiteren Faktors erfordert, dass künftig immer alle '
      .'Faktoren angegeben werden, statt einen auszuwählen.',

  // --- Editor link ---

  'Editor Link' => 'Editor-Link',
  'User Guide: Configuring an External Editor'
    => 'Benutzerhandbuch: Externen Editor konfigurieren',
  'External Editor' => 'Externer Editor',
  'External Editor URI Variables' => 'URI-Variablen für externen Editor',
  'Replaced With' => 'Ersetzt durch',
  'Supported Protocol'       => 'Unterstütztes Protokoll',
  'Supported Editor Protocols'=> 'Unterstützte Editor-Protokolle',
  'View Configuration'        => 'Konfiguration anzeigen',
  'No allowed editor protocols are configured.'
    => 'Keine erlaubten Editor-Protokolle konfiguriert.',
  'Hypertext Transfer Protocol'         => 'Hypertext Transfer Protocol',
  'Hypertext Transfer Protocol over SSL'=> 'Hypertext Transfer Protocol over SSL',

  // Editor names — proper nouns, keep as-is
  'TextMate'        => 'TextMate',
  'MacVim'          => 'MacVim',
  'Vim'             => 'Vim',
  'Emacs'           => 'Emacs',
  'Sublime Text'    => 'Sublime Text',
  'Visual Studio Code' => 'Visual Studio Code',
  'Generic Editor'  => 'Generischer Editor',
  'IntelliJ IDEA'   => 'IntelliJ IDEA',
  'Zed'             => 'Zed',

  "Many text editors can be configured as URI handlers for special protocols "
  ."like `editor://`. If you have installed and configured such an editor, some "
  ."applications can generate links that you can click to open files locally.\n"
  ."\n"
  ."Provide a URI pattern for building external editor URIs in your environment. "
  ."For example, if you use TextMate on macOS, the pattern for your machine may "
  ."look something like this:\n"
  ."\n"
  ."```name=\"Example: TextMate on macOS\"\n"
  ."%s\n"
  ."```\n"
  ."\n"
  ."\n"
  ."For complete instructions on editor configuration, see **[[ %s | %s ]]**.\n"
  ."\n"
  ."See the tables below for a list of supported variables and protocols."
    => "Viele Texteditoren können als URI-Handler für spezielle Protokolle wie "
      ."`editor://` konfiguriert werden. Wer einen solchen Editor installiert und "
      ."konfiguriert hat, kann in einigen Anwendungen Links anklicken, um Dateien "
      ."direkt lokal zu öffnen.\n"
      ."\n"
      ."Gib ein URI-Muster für den externen Editor in Deiner Umgebung an. "
      ."Für TextMate unter macOS könnte das Muster beispielsweise so aussehen:\n"
      ."\n"
      ."```name=\"Beispiel: TextMate unter macOS\"\n"
      ."%s\n"
      ."```\n"
      ."\n"
      ."\n"
      ."Vollständige Anweisungen zur Editor-Konfiguration findest Du unter **[[ %s | %s ]]**.\n"
      ."\n"
      ."Die untenstehenden Tabellen enthalten die unterstützten Variablen und Protokolle.",

  // --- Contact numbers ---

  'Number'           => 'Nummer',
  'Add Contact Number'=> 'Kontaktnummer hinzufügen',
  'You haven\'t added any contact numbers to your account.'
    => 'Du hast noch keine Kontaktnummern zu Deinem Konto hinzugefügt.',

  // --- Password ---

  'Set Password' => 'Passwort festlegen',
  'Password Algorithms' => 'Passwort-Algorithmen',
  'You must enter your current password.' => 'Du musst Dein aktuelles Passwort eingeben.',

  'The strength of your stored password hash can be upgraded. To upgrade, '
  .'either: log out and log in using your password; or change your password.'
    => 'Die Stärke des gespeicherten Passwort-Hashes kann verbessert werden. '
      .'Dazu entweder ab- und wieder anmelden oder das Passwort ändern.',

  'Your account does not currently have a password set. You can choose a '
  .'password by performing a password reset.'
    => 'Für Dein Konto ist noch kein Passwort festgelegt. '
      .'Du kannst über einen Passwort-Reset ein Passwort wählen.',

  // --- E-Mail addresses ---

  'Primary Email Unverified' => 'Primäre E-Mail-Adresse nicht bestätigt',

  'Note: Removing an email address from your account will invalidate any '
  .'outstanding password reset links.'
    => 'Hinweis: Das Entfernen einer E-Mail-Adresse macht alle offenen '
      .'Links zum Zurücksetzen des Passworts ungültig.',

  'Send another copy of the verification email to %s?'
    => 'Noch eine Bestätigungs-E-Mail an %s senden?',

  'If you change your primary address, %s will send all email to %s.'
    => 'Wenn Du die primäre Adresse änderst, sendet %s alle E-Mails an %s.',

  'Note: Changing your primary email address will invalidate any outstanding '
  .'password reset links.'
    => 'Hinweis: Das Ändern der primären E-Mail-Adresse macht alle offenen '
      .'Links zum Zurücksetzen des Passworts ungültig.',

  'You are adding too many email addresses to your account too quickly.'
    => 'Du fügst Deinem Konto zu schnell zu viele E-Mail-Adressen hinzu.',

  // --- Linked accounts ---

  'Linked Accounts and Authentication' => 'Verknüpfte Konten und Authentifizierung',
  'You have no linked accounts.'       => 'Du hast keine verknüpften Konten.',
  'Permanently Linked' => 'Dauerhaft verknüpft',
  'Unlink'             => 'Verknüpfung aufheben',
  'Refresh'            => 'Aktualisieren',

  // --- Tokens / sessions ---

  'Expired'      => 'Abgelaufen',
  'Revoke All'   => 'Alle widerrufen',
  'You don\'t have any active tokens.' => 'Du hast keine aktiven Token.',

  // --- Account setup issues ---

  'Account Setup Issues' => 'Probleme bei der Kontoeinrichtung',
  'You have no account setup issues.' => 'Dein Konto hat keine Einrichtungsprobleme.',

  // --- Diffusion Blame (proper name, keep) ---
  'Diffusion Blame' => 'Diffusion Blame',

  // --- Europe date format: defuzz only (correct translation already) ---
  'Europe: 28-02-2000' => 'Europäisch (28-02-2000)',

  // --- 12/24h: defuzz only ---
  '12 Hour, 2:34 PM' => '12-Stunden (2:34 PM)',
  '24 Hour, 14:34'   => '24-Stunden (14:34)',

];
