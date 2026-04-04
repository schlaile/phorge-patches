#!/usr/bin/env php
<?php
declare(strict_types=1);

// Quick overview: missing/fuzzy pht() strings in infrastructure modules

$po_path   = __DIR__.'/../translation/de/work/phorge-de-work.po';
$infra_dir = __DIR__.'/../../phorge/src/infrastructure';
$view_dir  = __DIR__.'/../../phorge/src/view';

$modules = [
  ['infrastructure/storage',             "$infra_dir/storage"],
  ['infrastructure/daemon',              "$infra_dir/daemon"],
  ['infrastructure/util',                "$infra_dir/util"],
  ['infrastructure/query',               "$infra_dir/query"],
  ['infrastructure/diff',                "$infra_dir/diff"],
  ['infrastructure/cluster',             "$infra_dir/cluster"],
  ['infrastructure/env',                 "$infra_dir/env"],
  ['infrastructure/customfield',         "$infra_dir/customfield"],
  ['infrastructure/markup',              "$infra_dir/markup"],
  ['infrastructure/internationalization',"$infra_dir/internationalization"],
  ['infrastructure/edges',               "$infra_dir/edges"],
  ['infrastructure/lint',                "$infra_dir/lint"],
  ['infrastructure/editor',              "$infra_dir/editor"],
  ['infrastructure/management',          "$infra_dir/management"],
  ['infrastructure/testing',             "$infra_dir/testing"],
  ['infrastructure/ssh',                 "$infra_dir/ssh"],
  ['infrastructure/export',              "$infra_dir/export"],
  ['infrastructure/events',              "$infra_dir/events"],
  ['infrastructure/javelin',             "$infra_dir/javelin"],
  ['infrastructure/status',              "$infra_dir/status"],
  ['infrastructure/parser',              "$infra_dir/parser"],
  ['infrastructure/log',                 "$infra_dir/log"],
  ['infrastructure/cache',               "$infra_dir/cache"],
  ['view/phui',                          "$view_dir/phui"],
];

// --- Load PO ---
$po = load_po($po_path);

// --- Per module ---
foreach ($modules as [$label, $dir]) {
  if (!is_dir($dir)) continue;
  $strings = extract_pht($dir);
  $missing = [];
  $fuzzy   = [];
  foreach ($strings as $s) {
    if (!isset($po[$s])) {
      $missing[] = $s;
    } elseif ($po[$s]['fuzzy']) {
      $fuzzy[] = $s;
    } elseif ($po[$s]['msgstr'] === '') {
      $missing[] = $s;
    }
  }
  if (!$missing && !$fuzzy) continue;
  printf("\n=== %s  (%d fehlend, %d fuzzy) ===\n", $label, count($missing), count($fuzzy));
  foreach ($missing as $s) {
    echo '  [FEHLT]  '.json_encode($s, JSON_UNESCAPED_UNICODE)."\n";
  }
  foreach ($fuzzy as $s) {
    echo '  [FUZZY]  '.json_encode($s, JSON_UNESCAPED_UNICODE)."\n";
    echo '           -> '.json_encode($po[$s]['msgstr'], JSON_UNESCAPED_UNICODE)."\n";
  }
}

// --- Helpers ---

function extract_pht(string $dir): array {
  $it      = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
  $strings = [];
  foreach ($it as $f) {
    if (!$f->isFile() || $f->getExtension() !== 'php') continue;
    $src    = file_get_contents($f->getPathname());
    $tokens = token_get_all($src);
    $count  = count($tokens);
    for ($i = 0; $i < $count; $i++) {
      $tok = $tokens[$i];
      if (!is_array($tok) || $tok[0] !== T_STRING || $tok[1] !== 'pht') continue;
      $j = $i + 1;
      while ($j < $count && is_array($tokens[$j]) &&
             in_array($tokens[$j][0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])) $j++;
      if ($j >= $count || token_char($tokens[$j]) !== '(') continue;
      $j++;
      $expr = []; $depth = 1;
      while ($j < $count) {
        $ch = token_char($tokens[$j]);
        if ($ch === '(') { $depth++; $expr[] = $tokens[$j++]; continue; }
        if ($ch === ')') { if (--$depth === 0) break; $expr[] = $tokens[$j++]; continue; }
        if ($depth === 1 && $ch === ',') break;
        $expr[] = $tokens[$j++];
      }
      $s = eval_string($expr);
      if ($s !== null) $strings[] = $s;
    }
  }
  return array_unique($strings);
}

function token_char(array|string $tok): string {
  return is_array($tok) ? $tok[1] : $tok;
}

function eval_string(array $tokens): ?string {
  $result = ''; $saw = false;
  foreach ($tokens as $tok) {
    if (is_array($tok)) {
      if (in_array($tok[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])) continue;
      if ($tok[0] === T_CONSTANT_ENCAPSED_STRING) {
        $result .= decode_string($tok[1]); $saw = true; continue;
      }
      return null;
    }
    if ($tok === '.') continue;
    return null;
  }
  return $saw ? $result : null;
}

function decode_string(string $lit): string {
  return stripcslashes(substr($lit, 1, -1));
}

function load_po(string $path): array {
  $content = file_get_contents($path);
  $entries = [];
  $lines = explode("\n", $content);
  $i = 0; $n = count($lines);
  while ($i < $n) {
    $fuzzy = false;
    while ($i < $n && (trim($lines[$i]) === '' || str_starts_with(trim($lines[$i]), '#'))) {
      if (str_contains($lines[$i], 'fuzzy')) $fuzzy = true;
      $i++;
    }
    if ($i >= $n) break;
    if (!str_starts_with(trim($lines[$i]), 'msgid ')) { $i++; continue; }
    $msgid = read_str($lines, $i, $n);
    if ($msgid === null) continue;
    if ($i < $n && str_starts_with(trim($lines[$i]), 'msgid_plural')) {
      read_str($lines, $i, $n);
    }
    $msgstr = '';
    if ($i < $n && str_starts_with(trim($lines[$i]), 'msgstr')) {
      $msgstr = read_str($lines, $i, $n) ?? '';
      while ($i < $n && preg_match('/^msgstr\[\d+\]/', trim($lines[$i]))) {
        read_str($lines, $i, $n);
      }
    }
    if ($msgid === '') continue;
    $entries[$msgid] = ['msgstr' => $msgstr, 'fuzzy' => $fuzzy];
  }
  return $entries;
}

function read_str(array $lines, int &$i, int $n): ?string {
  $line = trim($lines[$i]);
  if (!preg_match('/^(?:msgid|msgstr(?:\[\d+\])?|msgid_plural)\s+"(.*)"$/', $line, $m)) return null;
  $s = po_unescape($m[1]); $i++;
  while ($i < $n && preg_match('/^"(.*)"$/', trim($lines[$i]), $m)) { $s .= po_unescape($m[1]); $i++; }
  return $s;
}

function po_unescape(string $s): string {
  return str_replace(['\\n', '\\"', '\\\\', '\\t'], ["\n", '"', '\\', "\t"], $s);
}
