# PHP 8 Tooling

Local helper tooling for PHP 8 compatibility work tracked in `T1371`.

This directory is intentionally separate from the actual upstream trees. It is
only meant to support local discovery and mechanical experiments.

## Included Tools

- `phpstan` for finding likely compatibility issues
- `rector` for limited, reviewable dry runs of mechanical transformations

## Usage

Install dependencies:

```bash
cd tools/php8
composer install
```

Examples:

```bash
vendor/bin/phpstan --version
vendor/bin/rector --version
```

Use the local configs from this directory:

```bash
vendor/bin/phpstan analyse -c phpstan.neon /path/to/file.php
vendor/bin/rector process -c rector.php /path/to/file.php --dry-run
```

Current notes:

- `phpstan` is currently most useful as a parser-level finder on selected
  slices
- the local `phpstan` config uses a very light bootstrap for helper functions
  instead of the full `__init_script__.php` loader
- `rector` should stay in explicit `--dry-run` mode with narrow target paths
- prefer feeding concrete files or small directories over whole trees

Rules:

- prefer `--dry-run` first
- keep rulesets small and explicit
- review and split generated changes manually before committing
- do not run bulk rewrites over all of `phorge` or `libphutil`
