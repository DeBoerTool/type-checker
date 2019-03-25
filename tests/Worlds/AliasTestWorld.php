<?php

namespace Dbt\TypeChecker\Tests\Worlds;

use Dbt\TypeChecker\Tests\Fixtures\ClassFixture;

/**
 * @mixin \PHPUnit\Framework\TestCase
 */
trait AliasTestWorld
{
    public function validTypesProvider ()
    {
        return [
            [
                [
                    'string',
                    'str',
                    'boolean',
                    'bool',
                    'integer',
                    'int',
                    'float',
                    'double',
                    'array',
                    'object',
                    'obj',
                    'resource',
                    'res',
                    'NULL',
                    'null'
                ],
            ],
            [
                [
                    'callable',
                    'iterable',
                    ClassFixture::class
                ]
            ]
        ];
    }

    public function invalidTypesProvider ()
    {
        return [
            [
                [
                    'flange',
                ],
            ],
            [
                [
                    'ThisClassDoesntExists::class'
                ]
            ]
        ];
    }
}
