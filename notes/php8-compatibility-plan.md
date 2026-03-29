# PHP 8 Compatibility Plan

Internal tracking task: `T1369`

This note tracks the local battle plan for getting `libphutil`, `phorge`,
and `phorge-arcanist` into good shape on modern PHP 8.x runtimes while keeping
the resulting patch series easy to port upstream.

## Current Read

- upstream is already landing small PHP 8.1+ and PHP 8.5 fixes instead of one
  large migration branch
- local testing currently runs on PHP `8.4.x`
- bootstrap blockers may live in `libphutil` or `arcanist`, not only in
  `phorge`

## Working Assumptions

- prefer small, thematic fixes over large automated rewrites
- keep `phorge` commit messages neutral and upstream-friendly
- keep `Ref T1369 ...` tracking in `phorge-patches`
- export upstreamable fixes as patch series as they stabilize

## Work Phases

### Phase 1: Bootstrap and Fatal Errors

Goal:
make CLI entry points and startup paths run cleanly enough on PHP 8.4 to allow
targeted testing.

Typical fixes:

- outdated error-handler signatures
- implicitly nullable parameter declarations
- runtime API changes that produce immediate fatal errors
- STDERR pollution that breaks scripts and Arcanist workflows

Target order:

1. `libphutil`
2. `phorge-arcanist`
3. `phorge`

### Phase 2: High-Volume Runtime Deprecations

Goal:
burn down repetitive warnings and exceptions that are mostly mechanical.

Typical fixes:

- `strlen(null)` and similar null-to-string issues
- `preg_match(null)` and related parameter validation problems
- missing guards around optional array keys or nullable values

Preferred shape:

- one commit per subsystem or bug family
- include a concrete reproducer where possible
- keep fixes narrow even if many more similar sites exist

### Phase 3: PHP 8.5 Cleanup Series

Goal:
follow upstream's current direction for `null array key` and comparable notices
with small landable commits.

Typical fixes:

- avoid using `null` as an array key
- normalize optional values before indexing
- tighten test fixtures that rely on old PHP behavior

### Phase 4: Externals and Tooling

Goal:
separate vendor and automation questions from core compatibility work.

Rules:

- handle bundled third-party code separately from Phorge/libphutil core logic
- prefer upstream/library updates over deep local rewrites where realistic
- use tooling like Rector or PHPStan only as assistants for mechanical work,
  not as an unreviewed bulk rewrite path

## Tooling Guidance

- `Rector` may help for limited mechanical transformations and discovery
- use `--dry-run` first and keep rulesets small
- review and split generated changes manually before committing
- use static analysis to find candidates, but keep final patches human-curated

## Output Expectations

For each fix series:

- reproduce locally on PHP 8.4 when feasible
- land the change in the target repository with an upstream-friendly commit
  message
- export or mirror the change into `phorge-patches` with `Ref T1369 ...`
- record any remaining blockers that prevent broader test execution

## Near-Term Backlog

- unblock startup/runtime fatals in `libphutil`
- inventory remaining PHP 8.4 blockers in `phorge-arcanist`
- cluster `phorge` issues into bootstrap, runtime, test, and externals buckets
- identify which fixes are already solved upstream and can simply be merged or
  cherry-picked later
