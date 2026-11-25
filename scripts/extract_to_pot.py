#!/usr/bin/env python3
"""Build a POT file from Phorge's `bin/i18n extract` cache.

    ./bin/i18n extract <phorge>          (writes <phorge>/src/.cache/i18n_strings.json)
    scripts/extract_to_pot.py <phorge>/src/.cache/i18n_strings.json \
        translation/import/current/phorge-current.pot

The extract cache is the same string inventory that PhorgeI18nTestCase uses,
so a PO synchronized against this POT has no unused and no missing keys.
"""
import datetime
import json
import sys

import polib

src, dst = sys.argv[1:3]
strings = json.load(open(src))
pot = polib.POFile(wrapwidth=79)
pot.metadata = {
    'Project-Id-Version': 'Phorge',
    'POT-Creation-Date':
        datetime.datetime.now().astimezone().strftime('%Y-%m-%d %H:%M%z'),
    'MIME-Version': '1.0',
    'Content-Type': 'text/plain; charset=UTF-8',
    'Content-Transfer-Encoding': '8bit',
}
for msgid in sorted(strings):
    if msgid == '':
        continue
    uses = strings[msgid]['uses'][:5]
    pot.append(polib.POEntry(
        msgid=msgid,
        msgstr='',
        occurrences=[(('src' + u['file']).replace('src/../', ''), str(u['line']))
                     for u in uses],
        flags=['php-format'] if '%' in msgid else []))
pot.save(dst)
print('%d entries' % len(pot), file=sys.stderr)
