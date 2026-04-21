#!/usr/bin/env php
<?php

declare(strict_types=1);

const PO_TO_TRANSLATION_USAGE = <<<EOTEXT
Usage:
  php scripts/po_to_translation.php --input <file.po> --class <ClassName> --locale <locale> [--output <file.php>] [--include-fuzzy] [--validate-only]

Examples:
  php scripts/po_to_translation.php \
    --input translation/de/work/phorge-de-work.po \
    --class PhabricatorGermanTranslation \
    --locale de_DE \
    --output /tmp/PhabricatorGermanTranslation.php

  php scripts/po_to_translation.php \
    --input translation/de/work/phorge-de-work.po \
    --class PhabricatorGermanTranslation \
    --locale de_DE \
    --validate-only
EOTEXT;

main($argv);

function po_str_starts_with(string $haystack, string $needle): bool {
  return strncmp($haystack, $needle, strlen($needle)) === 0;
}

function po_str_contains(string $haystack, string $needle): bool {
  return strpos($haystack, $needle) !== false;
}

function main(array $argv): void {
  try {
    $options = parse_cli_arguments($argv);
    $entries = parse_po_entries($options['input']);
    $result = build_translation_map(
      $entries,
      $options['include-fuzzy'],
      $options['input']);

    if ($options['validate-only']) {
      print_summary($result, $options['input'], true);
      return;
    }

    if ($options['output'] === null) {
      throw new RuntimeException(
        'Missing required argument --output unless --validate-only is used.');
    }

    $rendered = render_translation_class(
      $options['class'],
      $options['locale'],
      $options['input'],
      $result['translations']);

    $directory = dirname($options['output']);
    if (!is_dir($directory)) {
      throw new RuntimeException(
        sprintf('Output directory does not exist: %s', $directory));
    }

    $bytes = file_put_contents($options['output'], $rendered);
    if ($bytes === false) {
      throw new RuntimeException(
        sprintf('Failed to write output file: %s', $options['output']));
    }

    print_summary($result, $options['input'], false);
    fwrite(
      STDERR,
      sprintf("Wrote %d bytes to %s.\n", $bytes, $options['output']));
  } catch (Throwable $ex) {
    fwrite(STDERR, 'Error: '.$ex->getMessage()."\n");
    exit(1);
  }
}

function parse_cli_arguments(array $argv): array {
  $options = array(
    'input' => null,
    'output' => null,
    'class' => null,
    'locale' => null,
    'include-fuzzy' => false,
    'validate-only' => false,
  );

  $count = count($argv);
  for ($ii = 1; $ii < $count; $ii++) {
    $arg = $argv[$ii];
    switch ($arg) {
      case '--help':
      case '-h':
        fwrite(STDOUT, PO_TO_TRANSLATION_USAGE."\n");
        exit(0);
      case '--include-fuzzy':
        $options['include-fuzzy'] = true;
        break;
      case '--validate-only':
        $options['validate-only'] = true;
        break;
      case '--input':
      case '--output':
      case '--class':
      case '--locale':
        $ii++;
        if ($ii >= $count) {
          throw new RuntimeException(sprintf('Missing value for %s.', $arg));
        }
        $key = ltrim($arg, '-');
        $options[$key] = $argv[$ii];
        break;
      default:
        if (po_str_starts_with($arg, '--') && po_str_contains($arg, '=')) {
          [$flag, $value] = explode('=', $arg, 2);
          $key = ltrim($flag, '-');
          if (!array_key_exists($key, $options)) {
            throw new RuntimeException(sprintf('Unknown argument: %s', $flag));
          }
          $options[$key] = $value;
          break;
        }
        throw new RuntimeException(sprintf('Unknown argument: %s', $arg));
    }
  }

  foreach (array('input', 'class', 'locale') as $required) {
    if (!$options[$required]) {
      throw new RuntimeException(sprintf('Missing required argument --%s.', $required));
    }
  }

  if (!is_file($options['input'])) {
    throw new RuntimeException(
      sprintf('Input file does not exist: %s', $options['input']));
  }

  if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $options['class'])) {
    throw new RuntimeException(
      sprintf('Invalid PHP class name: %s', $options['class']));
  }

  return $options;
}

function parse_po_entries(string $path): array {
  $lines = file($path, FILE_IGNORE_NEW_LINES);
  if ($lines === false) {
    throw new RuntimeException(sprintf('Failed to read file: %s', $path));
  }

  $entries = array();
  $entry = new_po_entry();
  $active = null;

  foreach ($lines as $number => $line) {
    $line_number = $number + 1;

    if ($line === '') {
      if (entry_has_data($entry)) {
        $entries[] = finalize_po_entry($entry);
      }
      $entry = new_po_entry();
      $active = null;
      continue;
    }

    if (po_str_starts_with($line, '#,')) {
      $flag_line = trim(substr($line, 2));
      foreach (explode(',', $flag_line) as $flag) {
        $flag = trim($flag);
        if ($flag !== '') {
          $entry['flags'][$flag] = true;
        }
      }
      $active = null;
      continue;
    }

    if (po_str_starts_with($line, '#')) {
      $entry['comments'][] = $line;
      $active = null;
      continue;
    }

    if (preg_match('/^msgctxt\s+(.*)$/', $line, $matches)) {
      $entry['msgctxt'] = decode_po_string($matches[1], $path, $line_number);
      $active = array('field' => 'msgctxt', 'index' => null);
      continue;
    }

    if (preg_match('/^msgid\s+(.*)$/', $line, $matches)) {
      $entry['msgid'] = decode_po_string($matches[1], $path, $line_number);
      $active = array('field' => 'msgid', 'index' => null);
      continue;
    }

    if (preg_match('/^msgid_plural\s+(.*)$/', $line, $matches)) {
      $entry['msgid_plural'] = decode_po_string($matches[1], $path, $line_number);
      $active = array('field' => 'msgid_plural', 'index' => null);
      continue;
    }

    if (preg_match('/^msgstr\[(\d+)\]\s+(.*)$/', $line, $matches)) {
      $index = (int)$matches[1];
      $entry['msgstr_plural'][$index] = decode_po_string(
        $matches[2],
        $path,
        $line_number);
      $active = array('field' => 'msgstr_plural', 'index' => $index);
      continue;
    }

    if (preg_match('/^msgstr\s+(.*)$/', $line, $matches)) {
      $entry['msgstr'] = decode_po_string($matches[1], $path, $line_number);
      $active = array('field' => 'msgstr', 'index' => null);
      continue;
    }

    if (preg_match('/^".*"$/', $line)) {
      if ($active === null) {
        throw new RuntimeException(
          sprintf('%s:%d: stray continued string.', $path, $line_number));
      }

      $decoded = decode_po_string($line, $path, $line_number);
      if ($active['field'] === 'msgstr_plural') {
        $entry['msgstr_plural'][$active['index']] .= $decoded;
      } else {
        $field = $active['field'];
        $entry[$field] .= $decoded;
      }
      continue;
    }

    throw new RuntimeException(
      sprintf('%s:%d: unsupported PO line: %s', $path, $line_number, $line));
  }

  if (entry_has_data($entry)) {
    $entries[] = finalize_po_entry($entry);
  }

  return $entries;
}

function new_po_entry(): array {
  return array(
    'comments' => array(),
    'flags' => array(),
    'msgctxt' => null,
    'msgid' => null,
    'msgid_plural' => null,
    'msgstr' => null,
    'msgstr_plural' => array(),
  );
}

function entry_has_data(array $entry): bool {
  return $entry['msgid'] !== null
    || $entry['msgctxt'] !== null
    || $entry['msgid_plural'] !== null
    || $entry['msgstr'] !== null
    || $entry['msgstr_plural']
    || $entry['comments']
    || $entry['flags'];
}

function finalize_po_entry(array $entry): array {
  if ($entry['msgid'] === null) {
    $entry['msgid'] = '';
  }
  if ($entry['msgstr'] === null) {
    $entry['msgstr'] = '';
  }
  ksort($entry['msgstr_plural']);
  return $entry;
}

function decode_po_string(string $literal, string $path, int $line_number): string {
  $literal = trim($literal);
  $decoded = stripcslashes($literal);

  if (strlen($decoded) < 2 || $decoded[0] !== '"' || substr($decoded, -1) !== '"') {
    throw new RuntimeException(
      sprintf('%s:%d: invalid PO string literal: %s', $path, $line_number, $literal));
  }

  return substr($decoded, 1, -1);
}

function build_translation_map(array $entries, bool $include_fuzzy, string $path): array {
  $translations = array();
  $skipped_fuzzy = 0;
  $skipped_untranslated = 0;
  $skipped_other = 0;
  $i18n_arrays = 0;
  $plural_entries = 0;

  foreach ($entries as $index => $entry) {
    if ($entry['msgid'] === '') {
      $skipped_other++;
      continue;
    }

    if ($entry['msgctxt'] !== null) {
      $skipped_other++;
      continue;
    }

    if (isset($entry['flags']['fuzzy']) && !$include_fuzzy) {
      $skipped_fuzzy++;
      continue;
    }

    if ($entry['msgid_plural'] !== null) {
      $value = build_plural_translation_value($entry, $path, $index);
      if ($value === null) {
        $skipped_untranslated++;
        continue;
      }
      $translations[$entry['msgid']] = $value;
      $plural_entries++;
      continue;
    }

    $value = build_simple_translation_value($entry, $path, $index);
    if ($value === null) {
      $skipped_untranslated++;
      continue;
    }

    if (is_array($value)) {
      $i18n_arrays++;
    }

    $translations[$entry['msgid']] = $value;
  }

  ksort($translations);

  return array(
    'translations' => $translations,
    'translated' => count($translations),
    'skipped_fuzzy' => $skipped_fuzzy,
    'skipped_untranslated' => $skipped_untranslated,
    'skipped_other' => $skipped_other,
    'plural_entries' => $plural_entries,
    'i18n_arrays' => $i18n_arrays,
  );
}

function build_simple_translation_value(array $entry, string $path, int $index) {
  $translation = $entry['msgstr'];
  if ($translation === '') {
    return null;
  }

  return decode_special_translation_value($translation, $entry['msgid'], $path, $index);
}

function build_plural_translation_value(array $entry, string $path, int $index): ?array {
  if (!$entry['msgstr_plural']) {
    return null;
  }

  $variants = array();
  foreach ($entry['msgstr_plural'] as $variant_index => $translation) {
    if ($translation === '') {
      return null;
    }

    $decoded = decode_special_translation_value(
      $translation,
      sprintf('%s [plural %d]', $entry['msgid'], $variant_index),
      $path,
      $index);

    if (!is_string($decoded)) {
      throw new RuntimeException(
        sprintf(
          '%s: plural entry for "%s" may not use I18N-ARRAY inside msgstr[%d].',
          $path,
          $entry['msgid'],
          $variant_index));
    }

    $variants[] = $decoded;
  }

  return $variants;
}

function decode_special_translation_value(
  string $translation,
  string $msgid,
  string $path,
  int $index) {

  if (!po_str_starts_with($translation, "I18N-ARRAY\n")) {
    return $translation;
  }

  $payload = substr($translation, strlen("I18N-ARRAY\n"));
  if ($payload === '') {
    throw new RuntimeException(
      sprintf('%s: empty I18N-ARRAY payload for msgid "%s" (entry %d).',
        $path,
        $msgid,
        $index + 1));
  }

  return parse_i18n_array($payload, $path, $msgid, $index + 1);
}

function parse_i18n_array(
  string $payload,
  string $path,
  string $msgid,
  int $entry_number): array {

  $parser = new I18NArrayParser($payload, $path, $msgid, $entry_number);
  return $parser->parse();
}

function render_translation_class(
  string $class_name,
  string $locale,
  string $input_path,
  array $translations): string {

  $source = str_replace('\\', '/', $input_path);
  $generated = gmdate('Y-m-d H:i:s').' UTC';
  $array_code = render_php_array($translations, 2);

  return <<<EOPHP
<?php

/**
 * Generated from {$source}
 * Generated at {$generated}
 *
 * This file is machine-generated. Edit the PO source instead.
 */
final class {$class_name}
  extends PhutilTranslation {

  public function getLocaleCode() {
    return '{$locale}';
  }

  protected function getTranslations() {
    return {$array_code};
  }

}
EOPHP;
}

function render_php_array(array $value, int $level): string {
  if (!$value) {
    return 'array()';
  }

  $indent = str_repeat('  ', $level);
  $item_indent = str_repeat('  ', $level + 1);
  $is_list = array_keys($value) === range(0, count($value) - 1);

  $lines = array('array(');
  foreach ($value as $key => $item) {
    $rendered = is_array($item)
      ? render_php_array($item, $level + 1)
      : var_export($item, true);

    if ($is_list) {
      $lines[] = $item_indent.$rendered.',';
    } else {
      $lines[] = $item_indent.var_export((string)$key, true).' => '.$rendered.',';
    }
  }
  $lines[] = $indent.')';

  return implode("\n", $lines);
}

function print_summary(array $result, string $input, bool $validation_only): void {
  $mode = $validation_only ? 'Validated' : 'Generated';
  fwrite(
    STDERR,
    sprintf(
      "%s %d translation entries from %s.\n",
      $mode,
      $result['translated'],
      $input));

  fwrite(
    STDERR,
    sprintf(
      "Skipped %d fuzzy, %d untranslated, %d header/context entries.\n",
      $result['skipped_fuzzy'],
      $result['skipped_untranslated'],
      $result['skipped_other']));

  fwrite(
    STDERR,
    sprintf(
      "Included %d plural entries and %d I18N-ARRAY entries.\n",
      $result['plural_entries'],
      $result['i18n_arrays']));
}

final class I18NArrayParser {
  private string $input;
  private int $length;
  private int $offset = 0;
  private string $path;
  private string $msgid;
  private int $entryNumber;

  public function __construct(
    string $input,
    string $path,
    string $msgid,
    int $entry_number) {

    $this->input = $input;
    $this->length = strlen($input);
    $this->path = $path;
    $this->msgid = $msgid;
    $this->entryNumber = $entry_number;
  }

  public function parse(): array {
    $this->skipWhitespace();
    $value = $this->parseArray();
    $this->skipWhitespace();

    if ($this->offset !== $this->length) {
      $this->fail('Trailing content after I18N-ARRAY payload.');
    }

    return $value;
  }

  private function parseArray(): array {
    $this->expect('[');
    $this->skipWhitespace();

    $result = array();
    if ($this->peek() === ']') {
      $this->offset++;
      return $result;
    }

    while (true) {
      $this->skipWhitespace();
      $result[] = $this->parseValue();
      $this->skipWhitespace();

      $char = $this->peek();
      if ($char === ',') {
        $this->offset++;
        continue;
      }
      if ($char === ']') {
        $this->offset++;
        break;
      }

      $this->fail('Expected "," or "]" in array literal.');
    }

    return $result;
  }

  private function parseValue() {
    $char = $this->peek();
    if ($char === '[') {
      return $this->parseArray();
    }
    if ($char === "'") {
      return $this->parseString();
    }

    $this->fail('Expected array or single-quoted string.');
  }

  private function parseString(): string {
    $this->expect("'");
    $buffer = '';

    while (true) {
      if ($this->offset >= $this->length) {
        $this->fail('Unterminated single-quoted string.');
      }

      $char = $this->input[$this->offset++];
      if ($char === "'") {
        break;
      }

      if ($char === '\\') {
        if ($this->offset >= $this->length) {
          $this->fail('Dangling escape in string literal.');
        }

        $escaped = $this->input[$this->offset++];
        switch ($escaped) {
          case '\\':
          case "'":
            $buffer .= $escaped;
            break;
          case 'n':
            $buffer .= "\n";
            break;
          case 'r':
            $buffer .= "\r";
            break;
          case 't':
            $buffer .= "\t";
            break;
          default:
            $this->fail(
              sprintf('Unsupported escape sequence "\\%s".', $escaped));
        }
        continue;
      }

      $buffer .= $char;
    }

    return $buffer;
  }

  private function skipWhitespace(): void {
    while ($this->offset < $this->length) {
      $char = $this->input[$this->offset];
      if (!ctype_space($char)) {
        break;
      }
      $this->offset++;
    }
  }

  private function expect(string $expected): void {
    if ($this->peek() !== $expected) {
      $this->fail(sprintf('Expected "%s".', $expected));
    }
    $this->offset++;
  }

  private function peek(): ?string {
    if ($this->offset >= $this->length) {
      return null;
    }
    return $this->input[$this->offset];
  }

  private function fail(string $message) {
    throw new RuntimeException(
      sprintf(
        '%s: invalid I18N-ARRAY for msgid "%s" (entry %d, offset %d): %s',
        $this->path,
        $this->msgid,
        $this->entryNumber,
        $this->offset,
        $message));
  }
}
