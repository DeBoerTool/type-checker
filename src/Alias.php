<?php declare(strict_types=1);

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
        'callable' => ['callable'],
        'iterable' => ['iterable'],
        'NULL' => ['NULL', 'null'],
    ];

    public static function is (string $alias, string $original): bool
    {
        return in_array($alias, self::$aliases[$original] ?? []);
    }

    public static function isValid (string $alias): bool
    {
        return in_array($alias, self::all()) || class_exists($alias);
    }

    public static function all (string ...$excepts): array
    {
        $aliases = self::$aliases;

        foreach ($excepts as $except) {
            unset($aliases[$except]);
        }

        return array_reduce(
            $aliases,
            function (array $carry, array $item): array
            {
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
