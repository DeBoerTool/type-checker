<?php

namespace Dbt\TypeChecker;

final class Alias
{
    /** @var array */
    private static $aliases = [
        'string' => ['string', 'str'],
        'boolean' => ['boolean', 'bool'],
        'integer' => ['integer', 'int'],
        'double' => ['float', 'double'],
        'array' => ['array'],
        'object' => ['object', 'obj'],
        'resource' => ['resource', 'res'],
        'NULL' => ['NULL', 'null'],
    ];

    public static function is (string $alias, string $original)
    {
        $aliases = self::$aliases[$original] ?? [];

        return in_array($alias, $aliases);
    }

    public static function all (?string $except = null): array
    {
        $aliases = self::$aliases;

        if ($except) {
            unset($aliases[$except]);
        }

        return array_reduce(
            $aliases,
            function (array $carry, array $item) {
                return array_merge($carry, $item);
            },
            []
        );
    }

    public static function of (string $type): array
    {
        return self::$aliases[$type];
    }
}
