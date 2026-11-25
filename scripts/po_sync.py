#!/usr/bin/env python3
"""Synchronize the German work PO with a current POT without reformatting it.

    scripts/po_sync.py --po translation/de/work/phorge-de-work.po \
        --pot translation/import/current/phorge-current.pot \
        [--translations new.json] [--todo todo.json]

- active entries whose msgid is no longer in the POT become obsolete (#~)
  and move to the end of the file, so the history stays available
- msgids new in the POT are appended after the active entries, with their
  references; their msgstr comes from --translations (a JSON object
  msgid -> msgstr) or stays empty
- --todo writes the new msgids together with the closest old translation
  from `msgmerge --previous` as a JSON work list for translators
- existing entries are left byte-for-byte untouched; an existing empty
  msgstr is filled from --translations if available
"""
import argparse
import json
import os
import subprocess
import sys
import tempfile

import polib

ap = argparse.ArgumentParser()
ap.add_argument('--po', required=True)
ap.add_argument('--pot', required=True)
ap.add_argument('--translations')
ap.add_argument('--todo')
args = ap.parse_args()

pot = [e for e in polib.pofile(args.pot) if e.msgid]
current = {e.msgid for e in pot}
trans = json.load(open(args.translations)) if args.translations else {}

text = open(args.po).read()
blocks = text.rstrip('\n').split('\n\n')
header, rest = blocks[0], blocks[1:]
active, obsolete, known = [], [], set()
filled = moved = 0
for block in rest:
    if any(line.startswith('#~') for line in block.split('\n')):
        obsolete.append(block)
        continue
    entry = polib.pofile(header + '\n\n' + block + '\n')[0]
    if entry.msgid in current:
        known.add(entry.msgid)
        if not entry.msgstr and trans.get(entry.msgid):
            entry.msgstr = trans[entry.msgid]
            block = entry.__unicode__(wrapwidth=79).rstrip('\n')
            filled += 1
        active.append(block)
    else:
        entry.obsolete = True
        obsolete.append(entry.__unicode__(wrapwidth=79).rstrip('\n'))
        moved += 1

added = []
todo = []
pending = [e for e in pot if e.msgid not in known]
if args.todo and pending:
    with tempfile.TemporaryDirectory() as tmp:
        merged = os.path.join(tmp, 'merged.po')
        subprocess.run(['msgmerge', '-q', '--previous', '-o', merged,
                        args.po, args.pot], check=True)
        hints = {e.msgid: e for e in polib.pofile(merged)
                 if not e.obsolete and 'fuzzy' in e.flags}
    for e in pending:
        item = {'msgid': e.msgid,
                'refs': ['%s:%s' % o for o in e.occurrences]}
        if e.msgid in hints:
            item['similar_old_english'] = hints[e.msgid].previous_msgid
            item['similar_old_german'] = hints[e.msgid].msgstr
        todo.append(item)
    todo.sort(key=lambda i: i['refs'][0] if i['refs'] else '')
    json.dump(todo, open(args.todo, 'w'), ensure_ascii=False, indent=1)

pending.sort(key=lambda e: e.occurrences[0] if e.occurrences else ('', ''))
for e in pending:
    new = polib.POEntry(msgid=e.msgid, msgstr=trans.get(e.msgid, ''),
                        occurrences=e.occurrences, flags=e.flags)
    added.append(new.__unicode__(wrapwidth=79).rstrip('\n'))
    if new.msgstr:
        filled += 1

with open(args.po, 'w') as f:
    f.write('\n\n'.join([header] + active + added + obsolete) + '\n')
print('kept %d, added %d, filled %d, obsoleted %d' %
      (len(active), len(added), filled, moved), file=sys.stderr)
