#!/usr/bin/env php
<?php

declare(strict_types=1);

const USAGE = <<<EOTEXT
Usage:
  php scripts/patch_po.php --po <work.po> --patches <patches.php> [--dry-run]

The patches file must return a PHP array:
  [
    'msgid string' => 'msgstr string',
    ...
  ]

- Fuzzy entries whose msgid matches will have the fuzzy flag removed.
- Entries with empty msgstr ('') are skipped (left untouched).
- Multi-line PO strings (line-wrapped or newline-containing) are matched
  by their decoded content.

  --dry-run   Print what would be changed, do not write.
EOTEXT;

main($argv);

function main(array $argv): void {
  $opts = parse_args($argv);
  $patches = require $opts['patches'];
  if (!is_array($patches)) {
    fwrite(STDERR, "Patches file must return an array.\n");
    exit(1);
  }

  $raw = file_get_contents($opts['po']);
  if ($raw === false) {
    fwrite(STDERR, "Cannot read PO file: {$opts['po']}\n");
    exit(1);
  }

  $entries = parse_po($raw);
  [$result, $stats] = apply_patches($raw, $entries, $patches, $opts['dry_run']);

  printf(
    "Applied: %d  Defuzzied: %d  Not found: %d  Skipped (empty patch): %d\n",
    $stats['applied'], $stats['defuzzied'], $stats['not_found'], $stats['empty']
  );

  if ($opts['dry_run']) {
    echo "[dry-run] Not writing.\n";
    return;
  }

  file_put_contents($opts['po'], $result);
  echo "Written: {$opts['po']}\n";
}

// ---------------------------------------------------------------------------
// PO parser — returns list of entries with byte offsets
// ---------------------------------------------------------------------------

function parse_po(string $raw): array {
  $entries = [];
  $lines   = explode("\n", $raw);
  $offsets = [];  // byte offset of the start of each line
  $off = 0;
  foreach ($lines as $line) {
    $offsets[] = $off;
    $off += strlen($line) + 1; // +1 for the \n
  }
  $n = count($lines);
  $i = 0;

  while ($i < $n) {
    // Skip blank lines
    if (trim($lines[$i]) === '') { $i++; continue; }

    $entry_start_line = $i;

    // Collect comment/flag lines
    $fuzzy         = false;
    $flag_line     = null; // index of the '#, fuzzy' line (if any)
    while ($i < $n && str_starts_with(trim($lines[$i]), '#')) {
      if (preg_match('/^#,.*\bfuzzy\b/', trim($lines[$i]))) {
        $fuzzy     = true;
        $flag_line = $i;
      }
      $i++;
    }

    if ($i >= $n || trim($lines[$i]) === '') continue;
    if (!str_starts_with(trim($lines[$i]), 'msgid')) continue;

    // Parse msgid
    $msgid_start_line = $i;
    $msgid = read_po_string($lines, $i, $n);
    if ($msgid === null) continue;

    // Skip msgid_plural
    if ($i < $n && str_starts_with(trim($lines[$i]), 'msgid_plural')) {
      read_po_string($lines, $i, $n);
    }

    if ($i >= $n) break;

    // Parse msgstr (or msgstr[0])
    $msgstr_start_line = $i;
    if (!str_starts_with(trim($lines[$i] ?? ''), 'msgstr')) continue;
    $msgstr = read_po_string($lines, $i, $n);

    // Skip remaining msgstr[n]
    while ($i < $n && preg_match('/^msgstr\[\d+\]/', trim($lines[$i]))) {
      read_po_string($lines, $i, $n);
    }

    if ($msgid === '') continue; // header

    $entries[] = [
      'msgid'            => $msgid,
      'msgstr'           => $msgstr,
      'fuzzy'            => $fuzzy,
      'flag_line'        => $flag_line,
      'msgstr_start_line'=> $msgstr_start_line,
      'msgstr_end_line'  => $i - 1,  // last line of msgstr block
    ];
  }

  return $entries;
}

function read_po_string(array $lines, int &$i, int $n): ?string {
  $line = trim($lines[$i] ?? '');
  if (!preg_match('/^(?:msgid|msgstr(?:\[\d+\])?|msgid_plural)\s+"(.*)"$/', $line, $m)) {
    return null;
  }
  $str = po_unescape($m[1]);
  $i++;
  while ($i < $n && preg_match('/^"(.*)"$/', trim($lines[$i]), $m)) {
    $str .= po_unescape($m[1]);
    $i++;
  }
  return $str;
}

function po_unescape(string $s): string {
  return str_replace(['\\n', '\\"', '\\\\', '\\t'],
                     ["\n",  '"',   '\\',   "\t"], $s);
}

// ---------------------------------------------------------------------------
// Apply patches
// ---------------------------------------------------------------------------

function apply_patches(
  string $raw,
  array  $entries,
  array  $patches,
  bool   $dry_run
): array {
  $stats = ['applied' => 0, 'defuzzied' => 0, 'not_found' => 0, 'empty' => 0];

  // Index entries by msgid for O(1) lookup
  $index = [];
  foreach ($entries as $k => $e) {
    $index[$e['msgid']] = $k;
  }

  $lines = explode("\n", $raw);

  foreach ($patches as $msgid => $new_msgstr) {
    if ($new_msgstr === '') {
      $stats['empty']++;
      continue;
    }

    if (!isset($index[$msgid])) {
      fwrite(STDERR, "NOT FOUND: ".json_encode($msgid, JSON_UNESCAPED_UNICODE)."\n");
      $stats['not_found']++;
      continue;
    }

    $e = $entries[$index[$msgid]];

    if ($dry_run) {
      printf("  [PATCH] %s\n    old: %s\n    new: %s\n",
        json_encode($msgid, JSON_UNESCAPED_UNICODE),
        json_encode($e['msgstr'],  JSON_UNESCAPED_UNICODE),
        json_encode($new_msgstr,   JSON_UNESCAPED_UNICODE));
    }

    // Replace the msgstr lines
    $new_lines = encode_msgstr($new_msgstr);
    array_splice($lines,
      $e['msgstr_start_line'],
      $e['msgstr_end_line'] - $e['msgstr_start_line'] + 1,
      $new_lines);

    // Adjust subsequent line indices for the splice
    $delta = count($new_lines) - ($e['msgstr_end_line'] - $e['msgstr_start_line'] + 1);
    // Update all entries that come after this one
    foreach ($entries as &$other) {
      if ($other['msgstr_start_line'] > $e['msgstr_start_line']) {
        $other['msgstr_start_line'] += $delta;
        $other['msgstr_end_line']   += $delta;
        if ($other['flag_line'] !== null) {
          $other['flag_line'] += $delta;
        }
      }
    }
    unset($other);
    // Also update the current entry's flag_line if needed (flag is before msgstr)
    // and re-index for future iterations
    $entries[$index[$msgid]]['msgstr_start_line'] = $e['msgstr_start_line'];
    $entries[$index[$msgid]]['msgstr_end_line']   = $e['msgstr_start_line'] + count($new_lines) - 1;
    $stats['applied']++;

    // Remove fuzzy flag if present
    if ($e['fuzzy'] && $e['flag_line'] !== null) {
      $fl = $entries[$index[$msgid]]['flag_line'] ?? $e['flag_line'];
      // The flag_line hasn't shifted (it's before the msgstr), adjust if needed
      // Actually flag_line is before msgstr_start_line, so no delta needed
      $flag_line = $e['flag_line']; // original, not shifted
      if (isset($lines[$flag_line]) && preg_match('/^#,.*\bfuzzy\b/', $lines[$flag_line])) {
        // Remove just 'fuzzy' from the flags line, or remove the whole line
        $new_flag = preg_replace('/,?\s*fuzzy/', '', $lines[$flag_line]);
        $new_flag = preg_replace('/^#,\s*$/', '', $new_flag);
        if (trim($new_flag) === '#,' || trim($new_flag) === '#') {
          // Remove the line entirely
          array_splice($lines, $flag_line, 1);
          // Adjust all msgstr line indices that are after this removal
          foreach ($entries as &$other) {
            if (($other['msgstr_start_line'] ?? 0) > $flag_line) {
              $other['msgstr_start_line']--;
              $other['msgstr_end_line']--;
            }
            if (($other['flag_line'] ?? -1) > $flag_line) {
              $other['flag_line']--;
            }
          }
          unset($other);
        } else {
          $lines[$flag_line] = $new_flag;
        }
        $entries[$index[$msgid]]['fuzzy']     = false;
        $entries[$index[$msgid]]['flag_line'] = null;
        $stats['defuzzied']++;
      }
    }
  }

  return [implode("\n", $lines), $stats];
}

function encode_msgstr(string $str): array {
  // Returns array of lines (without trailing \n each, will be joined with \n)
  $parts = explode("\n", $str);
  $n     = count($parts);

  if ($n === 1) {
    return ['msgstr "'.po_escape($str).'"'];
  }

  $out = ['msgstr ""'];
  foreach ($parts as $idx => $part) {
    $suffix = ($idx < $n - 1) ? '\\n' : '';
    $out[]  = '"'.po_escape($part).$suffix.'"';
  }
  return $out;
}

function po_escape(string $s): string {
  return str_replace(['\\', '"', "\n", "\t"],
                     ['\\\\', '\\"', '\\n', '\\t'], $s);
}

// ---------------------------------------------------------------------------
// Arg parsing
// ---------------------------------------------------------------------------

function parse_args(array $argv): array {
  $opts = ['po' => null, 'patches' => null, 'dry_run' => false];
  $i    = 1;
  while ($i < count($argv)) {
    switch ($argv[$i]) {
      case '--po':      $opts['po']      = $argv[++$i]; break;
      case '--patches': $opts['patches'] = $argv[++$i]; break;
      case '--dry-run': $opts['dry_run'] = true;        break;
      default:
        fwrite(STDERR, "Unknown argument: {$argv[$i]}\n".USAGE."\n");
        exit(1);
    }
    $i++;
  }
  if (!$opts['po'] || !$opts['patches']) {
    fwrite(STDERR, USAGE."\n");
    exit(1);
  }
  return $opts;
}
