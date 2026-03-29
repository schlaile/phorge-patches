# libphutil Patches

Curated patch series against the current `libphutil` repository.

Recommendation:

- keep patches small and thematic
- prefer neutral, upstream-usable commit messages in the exported patches

## Current Series Notes

### `0002-reduce-php-8-bootstrap-deprecations.patch`

This patch fixes two early PHP 8 bootstrap problems:

- `libxml_disable_entity_loader()` is deprecated on PHP 8+, where external
  entity loading is already disabled by default
- `Phobject` historically implemented `Iterator` only to throw a
  `DomainException` when someone accidentally used `foreach` on a non-iterable
  object

The `Phobject` part is easy to misread, so the intent matters:

- the old implementation exposed the five `Iterator` methods
  (`current()`, `key()`, `next()`, `rewind()`, `valid()`)
- each of these methods immediately threw, so iteration was never actually
  supported
- on PHP 8, these interface methods now have stricter signatures and return
  types, which caused deprecation warnings during bootstrap

The patch switches `Phobject` from `Iterator` to `IteratorAggregate` and keeps
the same behavior by throwing from `getIterator()` instead.

That means:

- accidental `foreach ($object as ...)` still fails
- the same `DomainException` semantics are preserved
- PHP 8 no longer emits signature deprecations just from loading the class

This is intended as a compatibility-preserving refactor, not a behavior change.
