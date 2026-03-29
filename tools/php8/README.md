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
cd /home/peter/phorge-patches/tools/php8
composer install
```

Examples:

```bash
vendor/bin/phpstan --version
vendor/bin/rector --version
```

Rules:

- prefer `--dry-run` first
- keep rulesets small and explicit
- review and split generated changes manually before committing
- do not run bulk rewrites over all of `phorge` or `libphutil`
