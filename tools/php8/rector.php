<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php54\Rector\Array_\LongArrayToShortArrayRector;
use Rector\Php83\Rector\ClassConst\AddTypeToConstRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([]);
    $rectorConfig->sets([
        SetList::PHP_85,
        LevelSetList::UP_TO_PHP_84,
    ]);
    $rectorConfig->skip([
        __DIR__ . '/vendor',
        __DIR__ . '/var',
        LongArrayToShortArrayRector::class,
        AddTypeToConstRector::class,
    ]);
    $rectorConfig->importNames(false, false);
    $rectorConfig->removeUnusedImports(false);
};
