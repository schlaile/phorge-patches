<?php

// German translations for the project application.
// Covers: missing entries + corrected fuzzy matches.
//
// Terminology:
//   Trigger       = Auslöser
//   Milestone     = Meilenstein
//   Subproject    = Teilprojekt
//   Workboard     = Arbeitsfläche
//   Column        = Spalte
//   Backlog       = Rückstand
//   Watcher       = Beobachter
//   Ancestor      = Vorfahre
//   Root project  = Hauptprojekt

return [

  // -------------------------------------------------------------------------
  // Project tags / tagging
  // -------------------------------------------------------------------------

  'Project tags'         => 'Projekt-Tags',
  'Project tags added'   => 'Projekt-Tags hinzugefügt',
  'Project tags removed' => 'Projekt-Tags entfernt',
  'Added Project Tags'   => 'Projekt-Tags hinzugefügt',
  'Removed Project Tags' => 'Projekt-Tags entfernt',
  'Remove Project Tags'  => 'Projekt-Tags entfernen',
  'Add Project Tags'     => 'Projekt-Tags hinzufügen',
  'Change Project Tags'  => 'Projekt-Tags ändern',
  'Add projects: %s.'    => 'Projekte hinzugefügt: %s.',
  'Remove projects'      => 'Projekte entfernen',
  'Remove projects: %s.' => 'Projekte entfernt: %s.',
  'Add project tags.'    => 'Projekt-Tags hinzufügen.',
  'Remove project tags'  => 'Projekt-Tags entfernen',
  'Remove project tags: %s.' => 'Projekt-Tags entfernt: %s.',
  'Add project tags: %s.'    => 'Projekt-Tags hinzugefügt: %s.',
  'Add project tags.'        => 'Projekt-Tags hinzufügen.',
  'You must select at least one project tag to remove.'
    => 'Du musst mindestens einen Projekt-Tag zum Entfernen auswählen.',
  'You must select at least one project tag to add.'
    => 'Du musst mindestens einen Projekt-Tag zum Hinzufügen auswählen.',
  'Tagged with Project'    => 'Mit Projekt getaggt',
  'Support for Projects'   => 'Projektunterstützung',
  'Search for objects tagged with given projects.'
    => 'Nach Objekten suchen, die mit bestimmten Projekten getaggt sind.',
  'Select project tags for the object.'     => 'Projekt-Tags für das Objekt auswählen.',
  'Set project tags, overwriting current value.' => 'Projekt-Tags setzen und aktuellen Wert überschreiben.',
  'Remove project tags.'    => 'Projekt-Tags entfernen.',
  'Set project tags to'     => 'Projekt-Tags setzen auf',
  'Change project tags.'    => 'Projekt-Tags ändern.',

  'Added %s project(s): %s.'   => '%s Projekt(e) hinzugefügt: %s.',
  'Removed %s project(s): %s.' => '%s Projekt(e) entfernt: %s.',

  'Include results tagged with this project.'
    => 'Ergebnisse einschließen, die mit diesem Projekt getaggt sind.',
  'Exclude results tagged with this project.'
    => 'Ergebnisse ausschließen, die mit diesem Projekt getaggt sind.',

  // -------------------------------------------------------------------------
  // Member management
  // -------------------------------------------------------------------------

  'Project Members'  => 'Projektmitglieder',
  'Project members can take this action.'
    => 'Projektmitglieder können diese Aktion ausführen.',
  'members of all projects' => 'Mitglieder aller Projekte',
  'members of project'      => 'Mitglieder des Projektes',
  'members of any project'  => 'Mitglieder eines beliebigen Projektes',
  'Member'                  => 'Mitglied',
  'Not a Member'            => 'Kein Mitglied',
  'Initial Members'         => 'Anfangsmitglieder',
  'Initial project members.' => 'Anfangsmitglieder des Projektes.',
  'Set project members.'     => 'Projektmitglieder festlegen.',
  'New list of members.'     => 'Neue Mitgliederliste.',
  'Add members.'             => 'Mitglieder hinzufügen.',
  'Remove members.'          => 'Mitglieder entfernen.',
  'Set members, overwriting the current value.' => 'Mitglieder festlegen und aktuellen Wert überschreiben.',
  'Get the member list for the project.'        => 'Mitgliederliste des Projektes abrufen.',
  'Members and Watchers'     => 'Mitglieder und Beobachter',
  'Type members(<project>)...' => 'members(<Projekt>) eingeben...',
  'Find results for members of a project.' => 'Ergebnisse für Mitglieder eines Projektes suchen.',
  'Select project members.'  => 'Projektmitglieder auswählen.',
  'Membership Immutable'     => 'Mitgliedschaft unveränderlich',
  'This project does not support editing membership.'
    => 'Bei diesem Projekt kann die Mitgliedschaft nicht bearbeitet werden.',
  'Membership Locked'        => 'Mitgliedschaft gesperrt',
  'Membership for this project is locked. You can not leave.'
    => 'Die Mitgliedschaft in diesem Projekt ist gesperrt. Du kannst es nicht verlassen.',
  'Default Join Policy'      => 'Standard-Beitrittrichtlinie',
  'Can Lock Project Membership'  => 'Kann Projektmitgliedschaft sperren',
  'You do not have permission to lock project membership.'
    => 'Du hast keine Berechtigung, die Projektmitgliedschaft zu sperren.',
  'Remove %s as a project member of %s?' => '%s wirklich als Projektmitglied von %s entfernen?',
  'Remove Member' => 'Mitglied entfernen',
  'Remove Watcher' => 'Beobachter entfernen',
  'Remove %s as a watcher of %s?' => '%s wirklich als Beobachter von %s entfernen?',
  'Watching' => 'Beobachten',

  '%s added %s member(s): %s.'                          => '%s hat %s Mitglied(er) hinzugefügt: %s.',
  '%s removed %s member(s): %s.'                        => '%s hat %s Mitglied(er) entfernt: %s.',
  '%s edited member(s), added %s: %s; removed %s: %s.'  => '%s hat Mitglieder geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s added %s member(s) for %s: %s.'                   => '%s hat %s Mitglied(er) für %s hinzugefügt: %s.',
  '%s removed %s member(s) for %s: %s.'                 => '%s hat %s Mitglied(er) für %s entfernt: %s.',
  '%s edited member(s) for %s, added %s: %s; removed %s: %s.'
    => '%s hat Mitglieder für %s geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s changed project member(s), added %d: %s; removed %d: %s.'
    => '%s hat Projektmitglieder geändert, hinzugefügt %d: %s; entfernt %d: %s.',
  '%s added %d project member(s): %s.'   => '%s hat %d Projektmitglied(er) hinzugefügt: %s.',
  '%s removed %d project member(s): %s.' => '%s hat %d Projektmitglied(er) entfernt: %s.',

  '%s locked %s membership.'           => '%s hat die Mitgliedschaft von %s gesperrt.',
  '%s unlocked %s membership.'         => '%s hat die Mitgliedschaft von %s entsperrt.',
  "%s locked this project's membership."   => '%s hat die Projektmitgliedschaft gesperrt.',
  "%s unlocked this project's membership." => '%s hat die Projektmitgliedschaft entsperrt.',

  'Lock Project'   => 'Projekt sperren',
  'Unlock Project' => 'Projekt entsperren',
  'If you lock this project, members will be prevented from leaving it.'
    => 'Wenn Du dieses Projekt sperrst, können Mitglieder es nicht mehr verlassen.',
  'If you unlock this project, members will be free to leave.'
    => 'Wenn Du dieses Projekt entsperrst, können Mitglieder es jederzeit verlassen.',

  'Locked Project'  => 'Gesperrtes Projekt',
  'Normal Project'  => 'Normales Projekt',
  'Users with access may join this project, but may not leave.'
    => 'Berechtigte Benutzer können diesem Projekt beitreten, es aber nicht verlassen.',
  'Users with access may join and leave this project.'
    => 'Berechtigte Benutzer können diesem Projekt beitreten und es verlassen.',

  'Parent Project' => 'Übergeordnetes Projekt',
  'Members of the parent project are members of this project.'
    => 'Mitglieder des übergeordneten Projektes sind automatisch Mitglieder dieses Projektes.',
  'Members of all subprojects are members of this project.'
    => 'Mitglieder aller Teilprojekte sind automatisch Mitglieder dieses Projektes.',

  // -------------------------------------------------------------------------
  // Watching / mail
  // -------------------------------------------------------------------------

  'Watch Project?'   => 'Projekt beobachten?',
  'Unwatch Project?' => 'Projekt nicht mehr beobachten?',
  'Watching Ancestor' => 'Vorfahre wird beobachtet',

  'Join this project? You will become a member and enjoy whatever benefits '
  .'membership may confer.'
    => 'Diesem Projekt beitreten? Du wirst Mitglied und genießt alle Vorteile der Mitgliedschaft.',

  'You are already watching %s, an ancestor of this project, and are thus '
  .'watching all of its subprojects.'
    => 'Du beobachtest bereits %s, einen Vorfahren dieses Projektes, und beobachtest damit automatisch alle seine Teilprojekte.',

  'Watching a project will let you monitor it closely. You will receive email '
  .'and notifications about changes to every object tagged with projects you '
  .'watch.'
    => 'Durch das Beobachten eines Projektes wirst Du eng mit ihm verbunden. '
      .'Du erhältst E-Mails und Benachrichtigungen über Änderungen an allen Objekten, '
      .'die mit von Dir beobachteten Projekten getaggt sind.',

  'Watching a project also watches all subprojects and milestones of that '
  .'project.'
    => 'Das Beobachten eines Projektes schließt auch alle Teilprojekte und Meilensteine ein.',

  'You will no longer receive email or notifications about every object '
  .'associated with this project.'
    => 'Du erhältst keine E-Mails oder Benachrichtigungen mehr über Objekte, die mit diesem Projekt verknüpft sind.',

  'Enable Mail'         => 'E-Mail aktivieren',
  'Disable Mail'        => 'E-Mail deaktivieren',
  'Enable Project Mail' => 'Projekt-E-Mail aktivieren',
  'Disable Project Mail'=> 'Projekt-E-Mail deaktivieren',
  'Not a Member'        => 'Kein Mitglied',

  'You have disabled mail. When mail is sent to project members, you will not '
  .'receive a copy.'
    => 'Du hast E-Mail deaktiviert. Du erhältst keine Kopien von E-Mails an Projektmitglieder.',

  'You are a member and you will receive mail that is sent to all project '
  .'members.'
    => 'Du bist Mitglied und erhältst E-Mails, die an alle Projektmitglieder gesendet werden.',

  'You are watching this project and will receive mail about changes made to '
  .'any related object.'
    => 'Du beobachtest dieses Projekt und erhältst E-Mails über Änderungen an verknüpften Objekten.',

  'When mail is sent to members of this project, you will receive a '
  .'copy.'
    => 'Du erhältst eine Kopie von E-Mails, die an Mitglieder dieses Projektes gesendet werden.',

  'When mail is sent to members of this project, you will no longer receive a '
  .'copy.'
    => 'Du erhältst keine Kopien mehr von E-Mails an Mitglieder dieses Projektes.',

  'Project Watchers'   => 'Projektbeobachter',
  'Get the watcher list for the project.' => 'Beobachterliste des Projektes abrufen.',
  'Project Ancestors'  => 'Projektvorfahren',
  'Get the full ancestor list for each project.' => 'Vollständige Vorfahrenliste für jedes Projekt abrufen.',

  // -------------------------------------------------------------------------
  // Project log messages (%s did X)
  // -------------------------------------------------------------------------

  '%s edited project(s), added %s: %s; removed %s: %s.'
    => '%s hat Projekte geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s added %s project(s) for %s: %s.'
    => '%s hat %s Projekt(e) für %s hinzugefügt: %s.',
  '%s removed %s project(s) for %s: %s.'
    => '%s hat %s Projekt(e) für %s entfernt: %s.',
  '%s edited project(s) for %s, added %s: %s; removed %s: %s.'
    => '%s hat Projekte für %s geändert, hinzugefügt %s: %s; entfernt %s: %s.',
  '%s edited associated projects.'    => '%s hat verknüpfte Projekte bearbeitet.',
  '%s set the color for %s to %s.'    => '%s hat die Farbe von %s auf %s gesetzt.',
  '%s locked %s membership.'          => '%s hat die Mitgliedschaft von %s gesperrt.',
  '%s unlocked %s membership.'        => '%s hat die Mitgliedschaft von %s entsperrt.',
  '%s archived this project.'         => '%s hat dieses Projekt archiviert.',
  '%s activated this project.'        => '%s hat dieses Projekt aktiviert.',
  '%s changed the default sort order for the project workboard.'
    => '%s hat die Standardsortierung der Projekt-Arbeitsfläche geändert.',
  '%s changed the background color of the project workboard.'
    => '%s hat die Hintergrundfarbe der Projekt-Arbeitsfläche geändert.',
  '%s enabled the workboard for this project.'
    => '%s hat die Arbeitsfläche für dieses Projekt aktiviert.',
  '%s disabled the workboard for this project.'
    => '%s hat die Arbeitsfläche für dieses Projekt deaktiviert.',
  '%s renamed this project from %s to %s.'
    => '%s hat dieses Projekt von %s in %s umbenannt.',
  '%s renamed %s from %s to %s.'
    => '%s hat %s von %s in %s umbenannt.',
  '%s set the image for %s to %s.'    => '%s hat das Bild von %s auf %s gesetzt.',
  '%s removed the image for %s.'      => '%s hat das Bild von %s entfernt.',
  '%s updated the image for %s from %s to %s.'
    => '%s hat das Bild von %s von %s auf %s geändert.',
  "%s set this project's image to %s."   => '%s hat das Projektbild auf %s gesetzt.',
  "%s removed this project's image."     => '%s hat das Projektbild entfernt.',
  "%s updated this project's image from %s to %s."
    => '%s hat das Projektbild von %s auf %s geändert.',
  '%s changed the default filter for the project workboard.'
    => '%s hat den Standardfilter der Projekt-Arbeitsfläche geändert.',
  '%s set the column trigger to %s.'
    => '%s hat den Spalten-Auslöser auf %s gesetzt.',
  '%s removed the trigger for this column (was %s).'
    => '%s hat den Auslöser für diese Spalte entfernt (war %s).',
  '%s changed the trigger for this column from %s to %s.'
    => '%s hat den Auslöser für diese Spalte von %s auf %s geändert.',
  '%s set the point limit for this column to %s.'
    => '%s hat das Punktelimit dieser Spalte auf %s gesetzt.',
  '%s removed the point limit for this column.'
    => '%s hat das Punktelimit dieser Spalte entfernt.',
  '%s changed the point limit for this column from %s to %s.'
    => '%s hat das Punktelimit dieser Spalte von %s auf %s geändert.',
  '%s named this column %s.'          => '%s hat diese Spalte „%s" genannt.',
  '%s renamed this column from %s to %s.'
    => '%s hat diese Spalte von %s in %s umbenannt.',
  '%s unhid this column.'             => '%s hat diese Spalte eingeblendet.',
  '%s hid this column.'               => '%s hat diese Spalte ausgeblendet.',
  '%s renamed this trigger from %s to %s.'
    => '%s hat diesen Auslöser von %s in %s umbenannt.',
  '%s named this trigger %s.'         => '%s hat diesen Auslöser „%s" genannt.',
  '%s stripped the name %s from this trigger.'
    => '%s hat den Namen %s von diesem Auslöser entfernt.',
  '%s updated the ruleset for this trigger.'
    => '%s hat das Regelwerk dieses Auslösers aktualisiert.',
  '%s created this trigger.'          => '%s hat diesen Auslöser erstellt.',
  '%s changed project hashtag(s), added %d: %s; removed %d: %s.'
    => '%s hat Projekt-Hashtags geändert, hinzugefügt %d: %s; entfernt %d: %s.',
  '%s added %d project hashtag(s): %s.'   => '%s hat %d Projekt-Hashtag(s) hinzugefügt: %s.',
  '%s removed %d project hashtag(s): %s.' => '%s hat %d Projekt-Hashtag(s) entfernt: %s.',
  '%s changed %s hashtag(s), added %d: %s; removed %d: %s.'
    => '%s hat %s-Hashtags geändert, hinzugefügt %d: %s; entfernt %d: %s.',
  '%s added %d %s hashtag(s): %s.'    => '%s hat %d %s-Hashtag(s) hinzugefügt: %s.',
  '%s removed %d %s hashtag(s): %s.'  => '%s hat %d %s-Hashtag(s) entfernt: %s.',

  // -------------------------------------------------------------------------
  // Project validation / constraints
  // -------------------------------------------------------------------------

  'Projects must have a name.'  => 'Projekte müssen einen Namen haben.',
  'Project names must not be longer than %s character(s).'
    => 'Projektnamen dürfen nicht länger als %s Zeichen sein.',
  'Project names must contain at least one letter or number.'
    => 'Projektnamen müssen mindestens einen Buchstaben oder eine Ziffer enthalten.',
  'Unknown project status \'%s\'!'
    => 'Unbekannter Projektstatus „%s"!',
  '%s project hashtag(s) are already used by other projects: %s.'
    => '%s Projekt-Hashtag(s) werden bereits von anderen Projekten verwendet: %s.',
  'Trigger names must not be longer than %s characters.'
    => 'Auslösernamen dürfen nicht länger als %s Zeichen sein.',
  'Ruleset specification is not valid. %s'
    => 'Die Regelwerk-Spezifikation ist ungültig. %s',
  'Value for "%s" rule is invalid: %s'
    => 'Der Wert für die Regel „%s" ist ungültig: %s',
  'Columns must have a name.'   => 'Spalten müssen einen Namen haben.',
  'Column names must not be longer than %s characters.'
    => 'Spaltennamen dürfen nicht länger als %s Zeichen sein.',
  'Column status "%s" is unrecognized, valid statuses are: %s.'
    => 'Spaltenstatus „%s" wird nicht erkannt, gültige Werte sind: %s.',
  'This column can not have a trigger.'
    => 'Diese Spalte kann keinen Auslöser haben.',

  // -------------------------------------------------------------------------
  // Project fields / properties
  // -------------------------------------------------------------------------

  'Projects being edited'   => 'Bearbeitete Projekte',
  'Project Fields'          => 'Projektfelder',
  'React to projects being created or updated.'
    => 'Auf erstellte oder aktualisierte Projekte reagieren.',
  'Project %s'              => 'Projekt %s',
  'Project depth is too great.'  => 'Die Projekttiefe ist zu groß.',
  'The name of the project.'     => 'Name des Projektes.',
  'Primary hashtag.'             => 'Primärer Hashtag.',
  'Subtype of the project.'      => 'Untertyp des Projektes.',
  'For milestones, milestone sequence number.' => 'Für Meilensteine: Meilenstein-Sequenznummer.',
  'Information about the project icon.'  => 'Informationen zum Projektsymbol.',
  'Information about the project color.' => 'Informationen zur Projektfarbe.',
  'Additional Hashtags'          => 'Weitere Hashtags',
  'Additional project tags.'     => 'Weitere Projekt-Tags.',
  'New list of hashtags.'        => 'Neue Hashtag-Liste.',
  'Custom Projects fields.'      => 'Benutzerdefinierte Projektfelder.',
  'Select and reorder project fields.' => 'Projektfelder auswählen und umsortieren.',
  'Adjust project icons.'        => 'Projektsymbole anpassen.',
  'Adjust project colors.'       => 'Projektfarben anpassen.',
  'Define project subtypes.'     => 'Projektuntertypen definieren.',

  'For subprojects and milestones, a brief description of the parent project.'
    => 'Für Teilprojekte und Meilensteine: Kurzbeschreibung des übergeordneten Projektes.',
  'For subprojects and milestones, depth of this project in the tree. Root '
  .'projects have depth 0.'
    => 'Für Teilprojekte und Meilensteine: Tiefe dieses Projektes im Baum. Hauptprojekte haben Tiefe 0.',

  'For columns that proxy another object (like a subproject or milestone), the '
  .'PHID of the object they proxy.'
    => 'Für Spalten, die ein anderes Objekt repräsentieren (z. B. Teilprojekt oder Meilenstein): die PHID des repräsentierten Objektes.',

  'The display name of the column.'     => 'Anzeigename der Spalte.',
  'The project the column belongs to.'  => 'Das Projekt, zu dem die Spalte gehört.',
  'True if this column is hidden.'      => 'Wahr, wenn diese Spalte ausgeblendet ist.',
  'True if this is the default column.' => 'Wahr, wenn dies die Standardspalte ist.',
  'The sequence in which this column appears on the workboard.'
    => 'Reihenfolge, in der diese Spalte auf der Arbeitsfläche erscheint.',

  // -------------------------------------------------------------------------
  // Edit / create project
  // -------------------------------------------------------------------------

  'Edit Project: %s'        => 'Projekt bearbeiten: %s',
  'Configure Project Forms' => 'Projektformulare konfigurieren',
  'Configure forms for creating projects.' => 'Formulare zum Erstellen von Projekten konfigurieren.',
  'Parent'                  => 'Übergeordnet',
  'Milestone Of'            => 'Meilenstein von',
  'Create a subproject of an existing project.'
    => 'Teilprojekt eines bestehenden Projektes erstellen.',
  'Choose a parent project to create a subproject beneath.'
    => 'Übergeordnetes Projekt für das neue Teilprojekt auswählen.',
  'PHID of the parent project.'  => 'PHID des übergeordneten Projektes.',
  'Parent project to create a milestone for.'
    => 'Übergeordnetes Projekt, für das ein Meilenstein erstellt werden soll.',
  'Choose a parent project to create a new milestone for.'
    => 'Übergeordnetes Projekt auswählen, für das ein neuer Meilenstein erstellt wird.',
  'Previous Milestone'      => 'Vorheriger Meilenstein',
  'Project name.'           => 'Projektname.',
  'Rename the project'      => 'Projekt umbenennen',
  'New project name.'       => 'Neuer Projektname.',
  'Project icon.'           => 'Projektsymbol.',
  'Change the project icon.' => 'Projektsymbol ändern.',
  'New project icon.'        => 'Neues Projektsymbol.',
  'Project tag color.'       => 'Farbe des Projekt-Tags.',
  'Change the project tag color.' => 'Farbe des Projekt-Tags ändern.',
  'New project tag color.'   => 'Neue Farbe des Projekt-Tags.',
  'Project name.'            => 'Projektname.',

  'Activate Project'         => 'Projekt aktivieren',
  'Looks Like'               => 'Erscheinungsbild',
  'Hashtags'                 => 'Hashtags',

  // -------------------------------------------------------------------------
  // Subprojects / milestones
  // -------------------------------------------------------------------------

  'Subprojects'             => 'Teilprojekte',
  'Project Subprojects'     => 'Projektteilprojekte',
  'Create Subproject'       => 'Teilprojekt erstellen',
  'Create Next Milestone'   => 'Nächsten Meilenstein erstellen',
  'Create Milestone'        => 'Meilenstein erstellen',
  'Milestone Name'          => 'Meilensteinname',
  'Subprojects and Milestones' => 'Teilprojekte und Meilensteine',
  'Subprojects can be created for this project.'  => 'Für dieses Projekt können Teilprojekte erstellt werden.',
  'Milestones can be created for this project.'   => 'Für dieses Projekt können Meilensteine erstellt werden.',
  '%s Subprojects'          => '%s Teilprojekte',
  '%s Milestones'           => '%s Meilensteine',
  'This project has subprojects.'  => 'Dieses Projekt hat Teilprojekte.',
  'This project has milestones.'   => 'Dieses Projekt hat Meilensteine.',
  'This project has no subprojects.' => 'Dieses Projekt hat keine Teilprojekte.',
  'This project has no milestones.'  => 'Dieses Projekt hat keine Meilensteine.',
  'No Subprojects'          => 'Keine Teilprojekte',
  'No Milestones'           => 'Keine Meilensteine',
  'You can not add subprojects to this project.'
    => 'Diesem Projekt können keine Teilprojekte hinzugefügt werden.',
  'You can not add milestones to this project.'
    => 'Diesem Projekt können keine Meilensteine hinzugefügt werden.',
  'Convert to Parent Project' => 'In übergeordnetes Projekt umwandeln',
  'Convert Project'         => 'Projekt umwandeln',
  'See Subprojects'         => 'Teilprojekte anzeigen',

  'Creating a project\'s first subproject **moves all members** to become '
  ."members of the subproject instead.\n"
  ."\n"
  .'See [[ %s | Projects User Guide ]] in the documentation for details. This '
  .'process can not be undone.'
    => "Das Erstellen des ersten Teilprojektes **verschiebt alle Mitglieder** in das Teilprojekt.\n"
      ."\n"
      .'Einzelheiten sind im [[ %s | Projekthandbuch ]] zu finden. Dieser Vorgang kann nicht rückgängig gemacht werden.',

  'This project is a milestone, and milestones may not have subprojects.'
    => 'Dieses Projekt ist ein Meilenstein. Meilensteine können keine Teilprojekte haben.',

  'This project is already a milestone, and milestones may not have their own '
  .'milestones.'
    => 'Dieses Projekt ist bereits ein Meilenstein. Meilensteine können keine eigenen Meilensteine haben.',

  'Milestone projects do not support subprojects or milestones.'
    => 'Meilensteinprojekte unterstützen keine Teilprojekte oder Meilensteine.',

  'You can not change members of a project with subprojects directly. Members '
  .'of any subproject are automatically members of the parent project.'
    => 'Mitglieder eines Projektes mit Teilprojekten können nicht direkt bearbeitet werden. Mitglieder eines Teilprojektes sind automatisch Mitglieder des übergeordneten Projektes.',

  'You can not change members of a milestone. Members of the parent project are '
  .'automatically members of the milestone.'
    => 'Mitglieder eines Meilenstein-Projektes können nicht bearbeitet werden. Mitglieder des übergeordneten Projektes sind automatisch Mitglieder des Meilensteins.',

  'You can only set a parent or milestone project when creating a project for '
  .'the first time.'
    => 'Ein übergeordnetes Projekt oder ein Meilensteinprojekt kann nur beim erstmaligen Erstellen eines Projektes festgelegt werden.',

  'Parent or milestone project PHID ("%s") must be the PHID of a valid, '
  .'visible project which you have permission to edit.'
    => 'Die PHID des übergeordneten Projekts oder Meilensteinprojekts („%s") muss die PHID eines gültigen, sichtbaren Projektes sein, das Du bearbeiten darfst.',

  'Parent or milestone project PHID ("%s") must not be a milestone. '
  .'Milestones may not have subprojects or milestones.'
    => 'Die PHID des übergeordneten Projekts oder Meilensteinprojekts („%s") darf kein Meilenstein sein. Meilensteine können keine Teilprojekte oder Meilensteine haben.',

  'You can not create a subproject or milestone under this parent because it '
  .'would nest projects too deeply. The maximum nesting depth of projects is %s.'
    => 'Unter diesem übergeordneten Projekt kann kein Teilprojekt oder Meilenstein erstellt werden, da die maximale Verschachtelungstiefe von %s überschritten würde.',

  // -------------------------------------------------------------------------
  // Workboard
  // -------------------------------------------------------------------------

  'Workboard'               => 'Arbeitsfläche',
  'Workboard Columns'       => 'Arbeitsflächen-Spalten',
  'Workboard: %s'           => 'Arbeitsfläche: %s',
  'Project Workboard'       => 'Projekt-Arbeitsfläche',
  'Manage Workboard'        => 'Arbeitsfläche verwalten',
  'Disable Workboard'       => 'Arbeitsfläche deaktivieren',
  'Enable Workboard'        => 'Arbeitsfläche aktivieren',
  'Workboard Disabled'      => 'Arbeitsfläche deaktiviert',
  'Create Workboard'        => 'Arbeitsfläche erstellen',
  'Unable to Create Workboard' => 'Arbeitsfläche konnte nicht erstellt werden',
  'New Empty Board'         => 'Leere Arbeitsfläche erstellen',
  'Create a new board with just a backlog column.'
    => 'Neue Arbeitsfläche mit nur einer Rückstands-Spalte erstellen.',
  'Import board columns from another project.'
    => 'Spalten von einer anderen Projekt-Arbeitsfläche importieren.',
  'Make Default'            => 'Als Standard festlegen',
  'Make the workboard the default view for this project.'
    => 'Arbeitsfläche als Standardansicht für dieses Projekt festlegen.',
  'The workboard for this project has not been created yet.'
    => 'Die Arbeitsfläche für dieses Projekt wurde noch nicht erstellt.',
  'This board has no columns.'  => 'Diese Arbeitsfläche hat keine Spalten.',
  'Visible'                 => 'Sichtbar',

  'Disabling a workboard hides the board. Objects on the board will no longer '
  .'be annotated with column names in other applications. You can restore the '
  .'workboard later.'
    => 'Das Deaktivieren der Arbeitsfläche blendet das Board aus. Objekte werden in anderen Anwendungen nicht mehr mit Spaltennamen versehen. Die Arbeitsfläche kann später wiederhergestellt werden.',

  'This workboard has been disabled, but can be restored to its former glory.'
    => 'Diese Arbeitsfläche ist deaktiviert, kann aber wiederhergestellt werden.',

  'This workboard has been disabled, and you do not have permission to enable '
  .'it. Only users who can edit this project can restore the workboard.'
    => 'Diese Arbeitsfläche ist deaktiviert. Du hast keine Berechtigung, sie zu aktivieren. Nur Benutzer mit Bearbeitungsrechten für dieses Projekt können sie wiederherstellen.',

  'The workboard for this project has not been created yet, but you do not have '
  .'permission to create it. Only users who can edit this project can create a '
  .'workboard for it.'
    => 'Die Arbeitsfläche für dieses Projekt wurde noch nicht erstellt. Du hast keine Berechtigung, sie zu erstellen. Nur Benutzer mit Bearbeitungsrechten für dieses Projekt können sie erstellen.',

  'Set Board Default Filter'  => 'Standardfilter der Arbeitsfläche festlegen',
  'Save Default Filter'       => 'Standardfilter speichern',
  'Set Board Default Order'   => 'Standardsortierung der Arbeitsfläche festlegen',
  'Save Default Order'        => 'Standardsortierung speichern',

  'Make the current filter the new default filter for this board? All users '
  .'will see the new filter as the default when they view the board.'
    => 'Den aktuellen Filter als neuen Standardfilter für diese Arbeitsfläche festlegen? Alle Benutzer sehen diesen Filter beim Öffnen des Boards als Standard.',

  'Make the current sort order the new default order for this board? All users '
  .'will see the new order as the default when they view the board.'
    => 'Die aktuelle Sortierung als neue Standardsortierung für diese Arbeitsfläche festlegen? Alle Benutzer sehen diese Sortierung beim Öffnen des Boards als Standard.',

  // Columns
  'Backlog'                 => 'Rückstand',
  '(Default)'               => '(Standard)',
  '(Hidden)'                => '(Ausgeblendet)',
  'Move to milestone %s.'   => 'In Meilenstein %s verschieben.',
  'Move to column %s.'      => 'In Spalte %s verschieben.',
  'Activate and Show Column'=> 'Spalte aktivieren und einblenden',
  'Archive and Hide Column' => 'Spalte archivieren und ausblenden',
  'Activate Subproject'     => 'Teilprojekt aktivieren',
  'Archive Subproject'      => 'Teilprojekt archivieren',
  'Visible Columns'         => 'Sichtbare Spalten',
  'Hidden Columns'          => 'Ausgeblendete Spalten',
  'Active Column'           => 'Aktive Spalte',
  'Hidden Column'           => 'Ausgeblendete Spalte',
  'Restricted Column'       => 'Eingeschränkte Spalte',
  'Can Not Hide Default Column' => 'Standardspalte kann nicht ausgeblendet werden',
  'You can not hide the default/backlog column on a board.'
    => 'Die Standard-/Rückstands-Spalte auf einer Arbeitsfläche kann nicht ausgeblendet werden.',
  'Workboard Already Has Columns' => 'Arbeitsfläche hat bereits Spalten',
  'Source Workboard Has No Columns' => 'Quell-Arbeitsfläche hat keine Spalten',
  'Import Columns'          => 'Spalten importieren',
  'Column: %s'              => 'Spalte: %s',
  'No Limit'                => 'Kein Limit',
  'Point Limit'             => 'Punktelimit',
  'Count Limit'             => 'Anzahllimit',
  'Maximum number of points of tasks allowed in the column.'
    => 'Maximale Gesamtpunktzahl der Aufgaben in dieser Spalte.',
  'Maximum number of tasks allowed in the column.'
    => 'Maximale Anzahl von Aufgaben in dieser Spalte.',

  'You can not import columns into this workboard because it already has '
  .'columns. You can only import into an empty workboard.'
    => 'In diese Arbeitsfläche können keine Spalten importiert werden, da sie bereits Spalten enthält. Spalten können nur in eine leere Arbeitsfläche importiert werden.',

  'You can not import columns from that workboard because it has no importable '
  .'columns.'
    => 'Aus dieser Arbeitsfläche können keine Spalten importiert werden, da sie keine importierbaren Spalten enthält.',

  'Choose a project or a milestone to import columns from:'
    => 'Projekt oder Meilenstein auswählen, aus dem Spalten importiert werden sollen:',

  'This column is hidden because it represents an archived subproject. Do you '
  .'want to activate the subproject so the column is visible again?'
    => 'Diese Spalte ist ausgeblendet, weil das zugehörige Teilprojekt archiviert ist. Soll das Teilprojekt aktiviert werden, um die Spalte wieder sichtbar zu machen?',

  'This column is visible because it represents an active subproject. Do you '
  .'want to hide the column by archiving the subproject?'
    => 'Diese Spalte ist sichtbar, weil das zugehörige Teilprojekt aktiv ist. Soll das Teilprojekt archiviert werden, um die Spalte auszublenden?',

  'Are you sure you want to hide this column? It will no longer appear on the '
  .'workboard.'
    => 'Diese Spalte wirklich ausblenden? Sie wird dann nicht mehr auf der Arbeitsfläche angezeigt.',

  'The selected column contains no visible tasks which you have permission to '
  .'edit.'
    => 'Die ausgewählte Spalte enthält keine sichtbaren Aufgaben, die Du bearbeiten darfst.',

  'The selected column contains no visible tasks which you have permission to '
  .'move.'
    => 'Die ausgewählte Spalte enthält keine sichtbaren Aufgaben, die Du verschieben darfst.',

  // Move tasks
  'No Movable Tasks'        => 'Keine verschiebbaren Aufgaben',
  'Move Tasks to Column'    => 'Aufgaben in Spalte verschieben',
  'Move Tasks to Column...' => 'Aufgaben in Spalte verschieben...',
  'Move Tasks to Project'   => 'Aufgaben in Projekt verschieben',
  'Move Tasks to Project...'=> 'Aufgaben in Projekt verschieben...',
  'Move to Column'          => 'In Spalte verschieben',
  'Move to Project'         => 'In Projekt verschieben',
  'Move Tasks'              => 'Aufgaben verschieben',
  'Choose a project to move tasks to.'       => 'Projekt auswählen, in das Aufgaben verschoben werden sollen.',
  'Choose a valid project to move tasks to.' => 'Gültiges Projekt auswählen, in das Aufgaben verschoben werden sollen.',
  'You must choose a project with a workboard.' => 'Du musst ein Projekt mit einer Arbeitsfläche auswählen.',
  'Choose a column to move tasks to.'        => 'Spalte auswählen, in die Aufgaben verschoben werden sollen.',
  'You can not move tasks to a hidden column.'  => 'Aufgaben können nicht in eine ausgeblendete Spalte verschoben werden.',
  'You can not move tasks from a column to itself.' => 'Aufgaben können nicht in dieselbe Spalte verschoben werden.',
  'Unsupported Project'     => 'Nicht unterstütztes Projekt',

  // Workboard display
  'Save as Default'         => 'Als Standard speichern',
  'Custom Filter'           => 'Benutzerdefinierter Filter',
  'Advanced Filter...'      => 'Erweiterter Filter...',
  'Hide Hidden Columns'     => 'Ausgeblendete Spalten verbergen',
  'Show Hidden Columns'     => 'Ausgeblendete Spalten anzeigen',
  'Fullscreen'              => 'Vollbild',
  'View Tasks as Query'     => 'Aufgaben als Suche anzeigen',
  'Bulk Edit Tasks...'      => 'Aufgaben in Stapeln bearbeiten...',

  // -------------------------------------------------------------------------
  // Triggers (Auslöser)
  // -------------------------------------------------------------------------

  'Trigger'                 => 'Auslöser',
  'Triggers'                => 'Auslöser',
  'Trigger %d'              => 'Auslöser %d',
  'Trigger: %s'             => 'Auslöser: %s',
  'Trigger Rules'           => 'Auslöser-Regeln',
  'Trigger Usage'           => 'Auslöser-Verwendung',
  'Custom Trigger'          => 'Benutzerdefinierter Auslöser',
  'Edit Trigger'            => 'Auslöser bearbeiten',
  'Edit Trigger: %s'        => 'Auslöser bearbeiten: %s',
  'Save Trigger'            => 'Auslöser speichern',
  'New Trigger'             => 'Neuer Auslöser',
  'New Trigger...'          => 'Neuer Auslöser...',
  'Create Trigger'          => 'Auslöser erstellen',
  'View Trigger'            => 'Auslöser anzeigen',
  'No Trigger'              => 'Kein Auslöser',
  'This trigger is not used by any columns.' => 'Dieser Auslöser wird von keiner Spalte verwendet.',
  'This trigger has no rules.'  => 'Dieser Auslöser hat keine Regeln.',
  'Used by Columns'         => 'Verwendet von Spalten',
  'This column does not have a trigger.' => 'Diese Spalte hat keinen Auslöser.',
  'Really remove the trigger from this column?' => 'Auslöser wirklich von dieser Spalte entfernen?',
  'Remove Trigger'          => 'Auslöser entfernen',
  'When a card is dropped into a column which uses this trigger:'
    => 'Wenn eine Karte in eine Spalte mit diesem Auslöser gezogen wird:',
  'Show Only Active Triggers'   => 'Nur aktive Auslöser anzeigen',
  'Show Only Inactive Triggers' => 'Nur inaktive Auslöser anzeigen',
  'Active Triggers'         => 'Aktive Auslöser',
  'All Triggers'            => 'Alle Auslöser',
  'No triggers found.'      => 'Keine Auslöser gefunden.',

  'When a card is dropped into a column that uses this trigger, these actions '
  .'will be taken.'
    => 'Wenn eine Karte in eine Spalte mit diesem Auslöser gezogen wird, werden folgende Aktionen ausgeführt.',

  // Trigger validation
  'Trigger ruleset is corrupt: expected a list of rule specifications, found '
  .'"%s".'
    => 'Das Regelwerk des Auslösers ist beschädigt: Eine Liste von Regelspezifikationen wurde erwartet, gefunden wurde „%s".',
  'Trigger ruleset is corrupt: rule (at index "%s") should be a rule '
  .'specification, but is actually "%s".'
    => 'Das Regelwerk des Auslösers ist beschädigt: Regel (an Index „%s") sollte eine Regelspezifikation sein, ist aber „%s".',
  'Trigger ruleset is corrupt: rule (at index "%s") is not a valid rule '
  .'specification: %s'
    => 'Das Regelwerk des Auslösers ist beschädigt: Regel (an Index „%s") ist keine gültige Regelspezifikation: %s',
  'Trigger ruleset is corrupt: rule type "%s" is unknown.'
    => 'Das Regelwerk des Auslösers ist beschädigt: Regeltyp „%s" ist unbekannt.',
  'Trigger ruleset is corrupt, rule (of type "%s") does not validate: %s'
    => 'Das Regelwerk des Auslösers ist beschädigt: Regel (vom Typ „%s") ist ungültig: %s',
  'Expected trigger rule (of class "%s") to return a list of transactions '
  .'from "newDropTransactions()", but got "%s".'
    => 'Auslöser-Regel (Klasse „%s") sollte eine Transaktionsliste von „newDropTransactions()" zurückgeben, aber es kam „%s".',
  'Trigger "%s" is not a valid trigger, or you do not have permission to view '
  .'it.'
    => 'Auslöser „%s" ist kein gültiger Auslöser oder Du hast keine Berechtigung, ihn anzuzeigen.',
  'Column point limit must either be empty or a nonnegative '
  .'integer.'
    => 'Das Spalten-Punktelimit muss entweder leer oder eine nicht-negative ganze Zahl sein.',

  // Trigger rules
  '(Invalid Rule)'          => '(Ungültige Regel)',
  'Invalid Rule'            => 'Ungültige Regel',
  'This rule (of type "%s") is invalid: %s' => 'Diese Regel (Typ „%s") ist ungültig: %s',
  'This rule (of type "%s") is invalid.'    => 'Diese Regel (Typ „%s") ist ungültig.',
  '(Unknown Rule)'          => '(Unbekannte Regel)',
  'Unknown Rule'            => 'Unbekannte Regel',
  'This is a trigger rule with a unknown type ("%s").'
    => 'Dies ist eine Auslöser-Regel mit einem unbekannten Typ („%s").',

  'Play sound'              => 'Ton abspielen',
  'Play sound %s.'          => 'Ton %s abspielen.',
  'Play Sound'              => 'Ton abspielen',
  'Coin'                    => 'Münze',
  'Glass'                   => 'Glas',
  'Status rule value should be a string, but is not (value is "%s").'
    => 'Der Wert der Status-Regel muss eine Zeichenkette sein (Wert ist „%s").',
  'Sound ("%s") is not a valid sound.'
    => 'Ton „%s" ist nicht gültig.',
  'Priority rule value should be a string, but is not (value is "%s").'
    => 'Der Wert der Prioritäts-Regel muss eine Zeichenkette sein (Wert ist „%s").',
  'Change task priority to %s.'  => 'Aufgabenpriorität auf %s ändern.',
  'Change task status to %s.'    => 'Aufgabenstatus auf %s ändern.',
  'Change Owner'            => 'Verantwortlichen ändern',
  'Assign task to user moving the task.' => 'Aufgabe dem Benutzer zuweisen, der sie verschiebt.',
  'Remove subscribers'      => 'Mitleser entfernen',
  'Remove subscribers: %s.' => 'Mitleser entfernt: %s.',
  'You must select at least one user or project tag to remove.'
    => 'Du musst mindestens einen Benutzer oder Projekt-Tag zum Entfernen auswählen.',
  'Add subscribers'         => 'Mitleser hinzufügen',
  'Add subscribers: %s.'    => 'Mitleser hinzugefügt: %s.',
  'You must select at least one user or project tag to add.'
    => 'Du musst mindestens einen Benutzer oder Projekt-Tag zum Hinzufügen auswählen.',
  'Owner rule value must have only one elmement (value is "%s").'
    => 'Der Wert der Verantwortlichen-Regel darf nur ein Element enthalten (Wert ist „%s").',
  'Owner rule value should be a list, but is not (value is "%s").'
    => 'Der Wert der Verantwortlichen-Regel muss eine Liste sein (Wert ist „%s").',
  'User PHID ("%s") is not a valid user.' => 'Benutzer-PHID „%s" ist kein gültiger Benutzer.',

  // -------------------------------------------------------------------------
  // Trigger usage display
  // -------------------------------------------------------------------------

  'Used on %s and %s other active column(s).' => 'Verwendet von %s und %s weiteren aktiven Spalten.',
  'Used on %s and %s other column(s).'        => 'Verwendet von %s und %s weiteren Spalten.',
  'Used on %s.'                               => 'Verwendet von %s.',
  'Used on %s active column(s).'              => 'Verwendet von %s aktiven Spalten.',
  'Used on %s column(s).'                     => 'Verwendet von %s Spalten.',
  'Unused trigger.'                           => 'Nicht verwendeter Auslöser.',

  // -------------------------------------------------------------------------
  // Project search and browsing
  // -------------------------------------------------------------------------

  'Search for objects with specific project PHIDs.'
    => 'Nach Objekten mit bestimmten Projekt-PHIDs suchen.',
  'Search for projects with particular hashtags.)'
    => 'Nach Projekten mit bestimmten Hashtags suchen.',
  'Search for projects with particular members.'
    => 'Nach Projekten mit bestimmten Mitgliedern suchen.',
  'Search for projects with particular watchers.'
    => 'Nach Projekten mit bestimmten Beobachtern suchen.',
  'Search for projects with given subtypes.'  => 'Nach Projekten mit bestimmten Untertypen suchen.',
  'Find direct subprojects of specified parents.' => 'Direkte Teilprojekte der angegebenen Projekte suchen.',
  'Find all subprojects beneath specified ancestors.' => 'Alle Teilprojekte unter den angegebenen Vorfahren suchen.',
  'Icons'                   => 'Symbole',
  'Search for projects with particular icons.'  => 'Nach Projekten mit bestimmten Symbolen suchen.',
  'Search for projects with particular colors.' => 'Nach Projekten mit bestimmten Farben suchen.',
  'Parent Projects'         => 'Übergeordnete Projekte',
  'Ancestor Projects'       => 'Vorfahren-Projekte',
  'Milestones'              => 'Meilensteine',
  'Show Only Milestones'    => 'Nur Meilensteine anzeigen',
  'Hide Milestones'         => 'Meilensteine ausblenden',
  'Root Projects'           => 'Hauptprojekte',
  'Show Only Root Projects' => 'Nur Hauptprojekte anzeigen',
  'Hide Root Projects'      => 'Hauptprojekte ausblenden',
  'Minimum Depth'           => 'Mindesttiefe',
  'Maximum Depth'           => 'Maximaltiefe',
  'Pass true to find only milestones, or false to omit milestones.'
    => 'true übergeben, um nur Meilensteine zu finden; false, um Meilensteine auszublenden.',
  'Pass true to find only root projects, or false to omit root projects.'
    => 'true übergeben, um nur Hauptprojekte zu finden; false, um Hauptprojekte auszublenden.',
  'Show Only Archived Projects' => 'Nur archivierte Projekte anzeigen',
  'No projects found.'      => 'Keine Projekte gefunden.',
  'Natural'                 => 'Standard',
  'Sort by Title'           => 'Nach Titel sortieren',
  'Sort by Points'          => 'Nach Punkten sortieren',
  'Sort by Created Date'    => 'Nach Erstellungsdatum sortieren',
  'Group by Author'         => 'Nach Autor gruppieren',
  'Group by Owner'          => 'Nach Verantwortlichem gruppieren',
  'Group by Status'         => 'Nach Status gruppieren',
  'Group by Priority'       => 'Nach Priorität gruppieren',
  'Not Assigned'            => 'Nicht zugewiesen',
  'Remove task assignee.'   => 'Aufgaben-Verantwortlichen entfernen.',
  'Assign task to %s.'      => 'Aufgabe %s zuweisen.',
  'Change status to %s.'    => 'Status auf %s ändern.',
  'Change priority to %s.'  => 'Priorität auf %s ändern.',
  'No column ordering exists with key "%s".'
    => 'Es existiert keine Spaltensortierung mit dem Schlüssel „%s".',
  'Unknown User ("%s")'     => 'Unbekannter Benutzer („%s")',

  // Search functions
  'Browse User Projects'    => 'Benutzerprojekte durchsuchen',
  'Type projects(<user>)...'=> 'projects(<Benutzer>) eingeben...',
  'Find results in any of a user\'s projects.'
    => 'Ergebnisse in beliebigen Projekten eines Benutzers suchen.',
  "User's Projects: %s"     => 'Projekte von %s',
  "User's Projects: Invalid User" => 'Projekte: ungültiger Benutzer',
  'Browse Not Tagged With Any Projects' => 'Ohne Projekt-Tag suchen',
  'Type "not tagged with any projects"...' => '„nicht mit Projekten getaggt" eingeben...',
  'Not Tagged With Any Projects'   => 'Nicht mit Projekten getaggt',
  'Find results which are not tagged with any projects.'
    => 'Ergebnisse suchen, die mit keinem Projekt getaggt sind.',
  'Select results with no tags.'   => 'Ergebnisse ohne Tags auswählen.',
  'Type members(<project>)...'     => 'members(<Projekt>) eingeben...',
  'Browse Viewer Projects'         => 'Eigene Projekte durchsuchen',
  'Type viewerprojects()...'       => 'viewerprojects() eingeben...',
  'Select projects current viewer is a member of.'
    => 'Projekte auswählen, in denen der aktuelle Benutzer Mitglied ist.',
  'Find results in any of the current viewer\'s projects.'
    => 'Ergebnisse in beliebigen Projekten des aktuellen Benutzers suchen.',
  'Browse Users and Projects'      => 'Benutzer und Projekte durchsuchen',
  'Browse Only'                    => 'Nur durchsuchen',
  'Type only()...'                 => 'only() eingeben...',
  'Only Match Other Constraints'   => 'Nur andere Einschränkungen erfüllen',
  'Find results with only the specified tags.'
    => 'Ergebnisse mit ausschließlich den angegebenen Tags suchen.',
  'Only'                           => 'Nur',
  'Select only results with exactly the other specified tags.'
    => 'Nur Ergebnisse mit genau den anderen angegebenen Tags auswählen.',
  'Type any(<project>) or not(<project>)...'
    => 'any(<Projekt>) oder not(<Projekt>) eingeben...',
  'Find results in any of several projects.'
    => 'Ergebnisse in beliebigen der angegebenen Projekte suchen.',
  'Not In: ...'                    => 'Nicht in: ...',
  'Find results not in specific projects.'
    => 'Ergebnisse suchen, die nicht in bestimmten Projekten sind.',
  'Type a project subtype name...' => 'Projektuntertyp-Namen eingeben...',
  'Type a user, project name, or function...'
    => 'Benutzer, Projektnamen oder Funktion eingeben...',

  // Watching / membership indicator
  'This project does not have any watchers.'
    => 'Dieses Projekt hat keine Beobachter.',
  'Select results with no tags.'   => 'Ergebnisse ohne Tags auswählen.',

  // -------------------------------------------------------------------------
  // Project views / menu
  // -------------------------------------------------------------------------

  'Project Details'         => 'Projektdetails',
  'Project Reports'         => 'Projektberichte',
  'Project Calendar'        => 'Projektkalender',
  'Project Points'          => 'Projektpunkte',
  'Project Picture'         => 'Projektbild',
  'Manage Project'          => 'Projekt verwalten',
  'Edit Menu'               => 'Menü bearbeiten',
  'Reports / Burnup'        => 'Berichte / Burnup',
  'Points Bar'              => 'Punktebalken',
  '%s: Burnup / Burndown Rate' => '%s: Burnup- / Burndown-Rate',
  '%s: Activity'            => '%s: Aktivität',
  'Too many tasks (%s).'    => 'Zu viele Aufgaben (%s).',
  'This milestone has no tasks.'     => 'Dieser Meilenstein hat keine Aufgaben.',
  'No tasks have points assigned.'   => 'Keine Aufgaben haben Punkte.',
  'No tasks have positive points.'   => 'Keine Aufgaben haben positive Punkte.',
  '%s of %s %s'             => '%s von %s %s',

  'This is a progress bar which shows how many points of work are complete '
  .'within the milestone. It has no configurable settings.'
    => 'Dies ist ein Fortschrittsbalken, der anzeigt, wie viele Punkte innerhalb des Meilensteins abgeschlossen sind. Er hat keine konfigurierbaren Einstellungen.',

  // Closed tasks / burnup
  'Closed Tasks'            => 'Geschlossene Aufgaben',
  'Tasks Moved Into Project'=> 'In das Projekt verschobene Aufgaben',
  'Tasks Reopened'          => 'Wiedereröffnete Aufgaben',
  'Tasks Created'           => 'Erstellungsdatum',
  'Tasks Closed'            => 'Geschlossen',
  'Tasks Moved Out of Project' => 'Aus dem Projekt verschobene Aufgaben',

  // -------------------------------------------------------------------------
  // Project background colors
  // -------------------------------------------------------------------------

  'Use Parent Background (Default)' => 'Hintergrund des übergeordneten Projektes verwenden (Standard)',
  'No Background'           => 'Kein Hintergrund',
  'Background Color'        => 'Hintergrundfarbe',
  'Solid Colors'            => 'Volltonfarben',
  'Gradients'               => 'Farbverläufe',
  'Edit Background Color'   => 'Hintergrundfarbe bearbeiten',
  'Change Background Color' => 'Hintergrundfarbe ändern',
  'Sky'                     => 'Himmel',
  'Fire'                    => 'Feuer',
  'Ripe Peach'              => 'Reifer Pfirsich',
  'Ripe Orange'             => 'Reife Orange',
  'Ripe Mango'              => 'Reife Mango',
  'Shallows'                => 'Flachwasser',
  'Reef'                    => 'Riff',
  'Depths'                  => 'Tiefsee',
  'This One Is Purple'      => 'Das hier ist Lila',
  'Unripe Plum'             => 'Unreife Pflaume',
  'Blue Sky'                => 'Blauer Himmel',
  'Intensity'               => 'Intensität',
  'Into The Expanse'        => 'Ins Weite',

  // -------------------------------------------------------------------------
  // Project icons
  // -------------------------------------------------------------------------

  'Trigger'     => 'Auslöser',
  'Timeline'    => 'Zeitachse',
  'Bugs'        => 'Fehler',
  'Cleanup'     => 'Aufräumen',
  'Umbrella'    => 'Dach',
  'Organization'=> 'Organisation',
  'Infrastructure' => 'Infrastruktur',
  'Milestone'   => 'Meilenstein',

  // -------------------------------------------------------------------------
  // Hashtag validation
  // -------------------------------------------------------------------------

  'Project name generates the same hashtag ("%s") as another existing '
  .'project. Choose a unique name.'
    => 'Der Projektname erzeugt denselben Hashtag („%s") wie ein bestehendes Projekt. Bitte wähle einen eindeutigen Namen.',

  'Hashtags must contain at least one letter or number. %s project hashtag(s) '
  .'are invalid: %s.'
    => 'Hashtags müssen mindestens einen Buchstaben oder eine Ziffer enthalten. %s Projekt-Hashtag(s) sind ungültig: %s.',

  // -------------------------------------------------------------------------
  // Notification subscription messages
  // -------------------------------------------------------------------------

  'Associate one or more projects to the object by listing their hashtags. '
  .'Separate project tags with spaces. For example, use `!projects #ios '
  ."#feature` to add both related projects.\n"
  ."\n"
  .'Projects which are invalid or unrecognized will be ignored. This command has '
  .'no effect if you do not specify any project tags.'
    => 'Dem Objekt können ein oder mehrere Projekte zugeordnet werden, indem deren Hashtags angegeben werden. '
      .'Projekt-Tags durch Leerzeichen trennen. Zum Beispiel: `!projects #ios '
      ."#feature` fügt beide Projekte hinzu.\n"
      ."\n"
      .'Ungültige oder unbekannte Projekte werden ignoriert. Ohne Angabe von Projekt-Tags hat dieser Befehl keine Wirkung.',

  'Add subscribers rule value should be a list, but is not '
  .'(value is "%s").'
    => 'Der Wert der Mitleser-Hinzufügen-Regel muss eine Liste sein (Wert ist „%s").',
  'Remove subscribers rule value should be a list, but is not '
  .'(value is "%s").'
    => 'Der Wert der Mitleser-Entfernen-Regel muss eine Liste sein (Wert ist „%s").',
  'Add project rule value should be a list, but is not '
  .'(value is "%s").'
    => 'Der Wert der Projekt-Hinzufügen-Regel muss eine Liste sein (Wert ist „%s").',
  'Remove project rule value should be a list, but is not '
  .'(value is "%s").'
    => 'Der Wert der Projekt-Entfernen-Regel muss eine Liste sein (Wert ist „%s").',
  'You must select at least one project tag to remove.'
    => 'Du musst mindestens einen Projekt-Tag zum Entfernen auswählen.',
  'You must select at least one project tag to add.'
    => 'Du musst mindestens einen Projekt-Tag zum Hinzufügen auswählen.',

  // -------------------------------------------------------------------------
  // API / Conduit
  // -------------------------------------------------------------------------

  'Apply transactions to create a new project or edit an existing one.'
    => 'Transaktionen anwenden, um ein neues Projekt zu erstellen oder ein bestehendes zu bearbeiten.',
  'Read information about workboard columns.'
    => 'Informationen über Arbeitsflächen-Spalten lesen.',
  'Execute searches for Projects.'     => 'Projektsuchen ausführen.',
  'Read information about projects.'   => 'Informationen über Projekte lesen.',
  'Get information about projects.'    => 'Projektinformationen abrufen.',
  'Get the workboard columns where an object appears.'
    => 'Arbeitsflächen-Spalten abrufen, in denen ein Objekt erscheint.',
  '%s / Any'                => '%s / Beliebig',
  '%s / All'                => '%s / Alle',
  'Projects User Guide'     => 'Projekthandbuch',

  // -------------------------------------------------------------------------
  // Notification strings (project card, etc.)
  // -------------------------------------------------------------------------

  'Project Card'            => 'Projektkarte',
  'Projects, Tags, and Teams' => 'Projekte, Tags und Teams',
  '[Project]'               => '[Projekt]',
  'Project name, hashtags, icon, image, or color changes.'
    => 'Änderungen an Projektname, Hashtags, Symbol, Bild oder Farbe.',
  'Project membership changes.' => 'Änderungen an der Projektmitgliedschaft.',
  'Project watcher list changes.' => 'Änderungen an der Projektbeobachterliste.',
  'Other project activity not listed above occurs.'
    => 'Andere Projektaktivitäten, die oben nicht aufgeführt sind.',
  'PROJECT DETAIL'          => 'PROJEKTDETAIL',

  // -------------------------------------------------------------------------
  // Config
  // -------------------------------------------------------------------------

  'Default view policy for newly created projects.'
    => 'Standardanzeigerichtlinie für neu erstellte Projekte.',
  'Default edit policy for newly created projects.'
    => 'Standardbearbeitungsrichtlinie für neu erstellte Projekte.',
  'Default join policy for newly created projects.'
    => 'Standardbeitrittsrichtlinie für neu erstellte Projekte.',
  'Configuration must be a list of project icon specifications.'
    => 'Die Konfiguration muss eine Liste von Projektsymbol-Spezifikationen sein.',
  'Value for index "%s" should be a dictionary.'
    => 'Der Wert für Index „%s" muss ein Dictionary sein.',
  'Configuration must be a list of project color specifications.'
    => 'Die Konfiguration muss eine Liste von Projektfarb-Spezifikationen sein.',

  // -------------------------------------------------------------------------
  // Various UI strings
  // -------------------------------------------------------------------------

  'Supported image formats: %s.'     => 'Unterstützte Bildformate: %s.',
  'Use Icon and Color'               => 'Symbol und Farbe verwenden',
  'Really activate project?'         => 'Projekt wirklich aktivieren?',
  'This project will be moved to the archive.' => 'Dieses Projekt wird archiviert.',
  'Query Overheated'                 => 'Abfrage überhitzt',
  'No Editable Tasks'                => 'Keine bearbeitbaren Aufgaben',
  'Use Icon and Color'               => 'Symbol und Farbe verwenden',

  // -------------------------------------------------------------------------
  // Watch/join action dialogs
  // -------------------------------------------------------------------------

  'Watch Project?'                   => 'Projekt beobachten?',

  "Your tremendous contributions to this project will be sorely missed. Are you "
  ."sure you want to leave?"
    => "Deine enormen Beiträge zu diesem Projekt werden sehr vermisst werden. Bist Du sicher, dass Du es verlassen möchtest?",

  "You are already watching %s, an ancestor of this project, and are thus "
  ."watching all of its subprojects."
    => "Du beobachtest bereits %s, einen Vorfahren dieses Projektes, und beobachtest damit automatisch alle seine Teilprojekte.",

  // -------------------------------------------------------------------------
  // Fuzzy corrections: Herald / subscriber rules
  // -------------------------------------------------------------------------

  'Project %s'              => 'Projekt %s',

];
