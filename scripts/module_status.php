#!/usr/bin/env php
<?php

declare(strict_types=1);

const USAGE = <<<EOTEXT
Usage:
  php scripts/module_status.php --phorge <phorge-dir> --po <work.po> [--app <appname>] [--module <modulepath>] [--all] [--all-modules] [--show-missing]

Examples:
  # Summary of all applications
  php scripts/module_status.php --phorge ../phorge --po translation/de/work/phorge-de-work.po --all

  # Summary of all source modules, including non-application core areas
  php scripts/module_status.php --phorge ../phorge --po translation/de/work/phorge-de-work.po --all-modules

  # Status for one application
  php scripts/module_status.php --phorge ../phorge --po translation/de/work/phorge-de-work.po --app maniphest

  # Show untranslated/fuzzy strings for one application
  php scripts/module_status.php --phorge ../phorge --po translation/de/work/phorge-de-work.po --app maniphest --show-missing

  # Status for one source module
  php scripts/module_status.php --phorge ../phorge --po translation/de/work/phorge-de-work.po --module aphront/configuration
EOTEXT;

main($argv);

function main(array $argv): void {
  $opts = parse_args($argv);
  $po = load_po($opts['po']);

  if ($opts['all']) {
    print_all_summary($opts['phorge'], $po);
  } elseif ($opts['all_modules']) {
    print_all_module_summary($opts['phorge'], $po);
  } elseif ($opts['app']) {
    $app_dir = $opts['phorge'].'/src/applications/'.$opts['app'];
    if (!is_dir($app_dir)) {
      fwrite(STDERR, "Application directory not found: {$app_dir}\n");
      exit(1);
    }
    $strings = extract_pht_strings($app_dir);
    if ($opts['show_missing']) {
      print_missing($strings, $po, $opts['app']);
    } else {
      print_app_summary($opts['app'], $strings, $po);
    }
  } elseif ($opts['module']) {
    $module_path = $opts['phorge'].'/src/'.$opts['module'];
    if (!is_dir($module_path) && !is_file($module_path)) {
      fwrite(STDERR, "Module path not found: {$module_path}\n");
      exit(1);
    }
    $strings = extract_pht_strings($module_path);
    if ($opts['show_missing']) {
      print_missing($strings, $po, $opts['module']);
    } else {
      print_app_summary($opts['module'], $strings, $po);
    }
  } else {
    fwrite(STDERR, USAGE."\n");
    exit(1);
  }
}

// --- PO loading ---

function load_po(string $path): array {
  // Returns: ['msgid' => ['msgstr' => string, 'fuzzy' => bool], ...]
  $content = file_get_contents($path);
  if ($content === false) {
    fwrite(STDERR, "Cannot read PO file: {$path}\n");
    exit(1);
  }

  $entries = [];
  $lines = explode("\n", $content);
  $i = 0;
  $n = count($lines);

  while ($i < $n) {
    // Collect flags
    $fuzzy = false;
    while ($i < $n && (trim($lines[$i]) === '' || str_starts_with(trim($lines[$i]), '#'))) {
      if (trim($lines[$i]) === '#, fuzzy' || str_contains($lines[$i], 'fuzzy')) {
        $fuzzy = true;
      }
      $i++;
    }

    if ($i >= $n) break;

    // Expect msgid
    if (!str_starts_with(trim($lines[$i]), 'msgid ')) {
      $i++;
      continue;
    }

    $msgid = parse_po_string($lines, $i, $n);
    if ($msgid === null) continue;

    // Skip msgid_plural for now; treat plural blocks as one entry
    if ($i < $n && str_starts_with(trim($lines[$i]), 'msgid_plural')) {
      // skip plural form
      parse_po_string($lines, $i, $n);
    }

    // Expect msgstr or msgstr[0]
    $msgstr = '';
    if ($i < $n && str_starts_with(trim($lines[$i]), 'msgstr')) {
      $msgstr = parse_po_string($lines, $i, $n);
      // skip remaining msgstr[n]
      while ($i < $n && preg_match('/^msgstr\[\d+\]/', trim($lines[$i]))) {
        parse_po_string($lines, $i, $n);
      }
    }

    if ($msgid === '') continue; // skip header
    $entries[$msgid] = ['msgstr' => $msgstr ?? '', 'fuzzy' => $fuzzy];
  }

  return $entries;
}

function parse_po_string(array $lines, int &$i, int $n): ?string {
  $line = trim($lines[$i]);
  if (!preg_match('/^(?:msgid|msgstr(?:\[\d+\])?|msgid_plural)\s+"(.*)"$/', $line, $m)) {
    return null;
  }
  $str = unescape_po($m[1]);
  $i++;

  // Continuation lines
  while ($i < $n && preg_match('/^"(.*)"$/', trim($lines[$i]), $m)) {
    $str .= unescape_po($m[1]);
    $i++;
  }

  return $str;
}

function unescape_po(string $s): string {
  return stripcslashes($s);
}

// --- Source extraction ---

function extract_pht_strings(string $dir): array {
  $strings = [];
  $files = [];
  if (is_file($dir)) {
    $files[] = $dir;
  } else {
    collect_php_files($dir, $files);
  }
  sort($files);
  foreach ($files as $file) {
    $src = file_get_contents($file);
    extract_from_source($src, $strings);
  }
  return array_unique($strings);
}

function collect_php_files(string $dir, array &$files): void {
  $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
  foreach ($it as $f) {
    if ($f->isFile() && $f->getExtension() === 'php') {
      $files[] = $f->getPathname();
    }
  }
}

function extract_from_source(string $src, array &$strings): void {
  $tokens = token_get_all($src);
  $count = count($tokens);

  for ($i = 0; $i < $count; $i++) {
    $token = $tokens[$i];
    if (!is_array($token) || $token[0] !== T_STRING || $token[1] !== 'pht') {
      continue;
    }

    $cursor = skip_trivia($tokens, $i + 1);
    if ($cursor >= $count || token_text($tokens[$cursor]) !== '(') {
      continue;
    }

    $cursor++;
    $expr = [];
    $depth = 1;
    while ($cursor < $count) {
      $text = token_text($tokens[$cursor]);

      if ($text === '(') {
        $depth++;
        $expr[] = $tokens[$cursor];
        $cursor++;
        continue;
      }

      if ($text === ')') {
        $depth--;
        if ($depth === 0) {
          break;
        }
        $expr[] = $tokens[$cursor];
        $cursor++;
        continue;
      }

      if ($depth === 1 && $text === ',') {
        break;
      }

      $expr[] = $tokens[$cursor];
      $cursor++;
    }

    $string = evaluate_string_expression($expr);
    if ($string !== null) {
      $strings[] = $string;
    }
  }
}

function skip_trivia(array $tokens, int $cursor): int {
  $count = count($tokens);
  while ($cursor < $count) {
    $token = $tokens[$cursor];
    if (!is_array($token)) {
      break;
    }

    $type = $token[0];
    if ($type !== T_WHITESPACE && $type !== T_COMMENT && $type !== T_DOC_COMMENT) {
      break;
    }

    $cursor++;
  }

  return $cursor;
}

function token_text(array|string $token): string {
  return is_array($token) ? $token[1] : $token;
}

function evaluate_string_expression(array $tokens): ?string {
  $result = '';
  $saw_string = false;
  $paren_depth = 0;

  foreach ($tokens as $token) {
    $text = token_text($token);

    if (is_array($token)) {
      $type = $token[0];

      if ($type === T_WHITESPACE || $type === T_COMMENT || $type === T_DOC_COMMENT) {
        continue;
      }

      if ($type === T_CONSTANT_ENCAPSED_STRING) {
        $result .= decode_php_string_literal($text);
        $saw_string = true;
        continue;
      }

      return null;
    }

    if ($text === '.') {
      continue;
    }

    if ($text === '(') {
      $paren_depth++;
      continue;
    }

    if ($text === ')') {
      if ($paren_depth === 0) {
        return null;
      }
      $paren_depth--;
      continue;
    }

    return null;
  }

  if ($paren_depth !== 0 || !$saw_string) {
    return null;
  }

  return $result;
}

function decode_php_string_literal(string $literal): string {
  $quote = $literal[0] ?? null;
  if ($quote !== '"' && $quote !== "'") {
    return $literal;
  }

  return stripcslashes(substr($literal, 1, -1));
}

// --- Reporting ---

function lookup_status(string $msgid, array $po): string {
  if (!isset($po[$msgid])) return 'unknown';
  if ($po[$msgid]['fuzzy']) return 'fuzzy';
  if ($po[$msgid]['msgstr'] === '') return 'missing';
  return 'translated';
}

function print_app_summary(string $app, array $strings, array $po): void {
  $counts = ['translated' => 0, 'fuzzy' => 0, 'missing' => 0, 'unknown' => 0];
  foreach ($strings as $s) {
    $counts[lookup_status($s, $po)]++;
  }
  $total = count($strings);
  printf("%-20s  total=%d  translated=%d  fuzzy=%d  missing=%d  unknown=%d\n",
    $app, $total,
    $counts['translated'], $counts['fuzzy'],
    $counts['missing'], $counts['unknown']);
}

function print_all_summary(string $phorge_dir, array $po): void {
  $apps_dir = $phorge_dir.'/src/applications';
  $apps = array_filter(scandir($apps_dir), fn($d) => $d[0] !== '.' && is_dir("$apps_dir/$d"));

  $rows = [];
  foreach ($apps as $app) {
    $strings = extract_pht_strings("$apps_dir/$app");
    $total = count($strings);
    if ($total === 0) continue;
    $counts = ['translated' => 0, 'fuzzy' => 0, 'missing' => 0, 'unknown' => 0];
    foreach ($strings as $s) {
      $counts[lookup_status($s, $po)]++;
    }
    $rows[] = [
      'app' => $app,
      'total' => $total,
      'translated' => $counts['translated'],
      'fuzzy' => $counts['fuzzy'],
      'missing' => $counts['missing'],
      'unknown' => $counts['unknown'],
      'pct' => $total > 0 ? round(100 * $counts['translated'] / $total) : 0,
    ];
  }

  // Sort by missing desc
  usort($rows, fn($a, $b) => $b['missing'] - $a['missing']);

  printf("%-22s %6s %10s %6s %7s %7s %5s\n",
    'Application', 'Total', 'Translated', 'Fuzzy', 'Missing', 'Unknown', 'Done%');
  printf("%s\n", str_repeat('-', 70));
  foreach ($rows as $r) {
    printf("%-22s %6d %10d %6d %7d %7d %4d%%\n",
      $r['app'], $r['total'], $r['translated'], $r['fuzzy'],
      $r['missing'], $r['unknown'], $r['pct']);
  }
}

function print_all_module_summary(string $phorge_dir, array $po): void {
  $src_dir = $phorge_dir.'/src';
  $files = [];
  collect_php_files($src_dir, $files);
  sort($files);

  $modules = [];
  foreach ($files as $file) {
    $module = classify_source_module($src_dir, $file);
    $src = file_get_contents($file);
    $modules[$module] ??= [];
    extract_from_source($src, $modules[$module]);
  }

  $rows = [];
  foreach ($modules as $module => $strings) {
    $strings = array_unique($strings);
    $total = count($strings);
    if ($total === 0) {
      continue;
    }

    $counts = ['translated' => 0, 'fuzzy' => 0, 'missing' => 0, 'unknown' => 0];
    foreach ($strings as $s) {
      $counts[lookup_status($s, $po)]++;
    }

    $rows[] = [
      'app' => $module,
      'total' => $total,
      'translated' => $counts['translated'],
      'fuzzy' => $counts['fuzzy'],
      'missing' => $counts['missing'],
      'unknown' => $counts['unknown'],
      'pct' => $total > 0 ? round(100 * $counts['translated'] / $total) : 0,
    ];
  }

  usort(
    $rows,
    fn($a, $b) =>
      ($b['missing'] + $b['fuzzy']) <=> ($a['missing'] + $a['fuzzy'])
        ?: $b['total'] <=> $a['total']
        ?: strcmp($a['app'], $b['app']));

  printf("%-22s %6s %10s %6s %7s %7s %5s\n",
    'Module', 'Total', 'Translated', 'Fuzzy', 'Missing', 'Unknown', 'Done%');
  printf("%s\n", str_repeat('-', 70));
  foreach ($rows as $r) {
    printf("%-22s %6d %10d %6d %7d %7d %4d%%\n",
      $r['app'], $r['total'], $r['translated'], $r['fuzzy'],
      $r['missing'], $r['unknown'], $r['pct']);
  }
}

function classify_source_module(string $src_dir, string $file): string {
  $relative = ltrim(substr($file, strlen($src_dir)), '/');
  $parts = explode('/', $relative);

  if (($parts[0] ?? null) === 'applications' && isset($parts[1])) {
    return 'app/'.$parts[1];
  }

  if (isset($parts[1])) {
    return $parts[0].'/'.$parts[1];
  }

  return $parts[0];
}

function print_missing(array $strings, array $po, string $app): void {
  echo "=== {$app}: strings needing work ===\n\n";
  foreach ($strings as $s) {
    $status = lookup_status($s, $po);
    if ($status === 'translated') continue;

    $label = match($status) {
      'fuzzy'   => '[FUZZY]  ',
      'missing' => '[MISSING]',
      default   => '[UNKNOWN]',
    };
    echo "{$label}  ".json_encode($s, JSON_UNESCAPED_UNICODE)."\n";
    if ($status === 'fuzzy' && isset($po[$s])) {
      echo "         -> ".json_encode($po[$s]['msgstr'], JSON_UNESCAPED_UNICODE)."\n";
    }
  }
}

// --- Arg parsing ---

function parse_args(array $argv): array {
  $opts = [
    'phorge' => null,
    'po' => null,
    'app' => null,
    'module' => null,
    'all' => false,
    'all_modules' => false,
    'show_missing' => false,
  ];
  $i = 1;
  while ($i < count($argv)) {
    switch ($argv[$i]) {
      case '--phorge': $opts['phorge'] = $argv[++$i]; break;
      case '--po':     $opts['po']     = $argv[++$i]; break;
      case '--app':    $opts['app']    = $argv[++$i]; break;
      case '--module': $opts['module'] = $argv[++$i]; break;
      case '--all':    $opts['all']    = true; break;
      case '--all-modules': $opts['all_modules'] = true; break;
      case '--show-missing': $opts['show_missing'] = true; break;
      default:
        fwrite(STDERR, "Unknown argument: {$argv[$i]}\n".USAGE."\n");
        exit(1);
    }
    $i++;
  }
  if (!$opts['phorge'] || !$opts['po']) {
    fwrite(STDERR, USAGE."\n");
    exit(1);
  }
  return $opts;
}
