<?php

namespace Dbt\TypeChecker\Tests\Worlds;

use Dbt\TypeChecker\Alias;
use Dbt\TypeChecker\Type;

/**
 * @mixin \PHPUnit\Framework\TestCase
 */
trait TypeTestWorld
{
    protected function evaluate ($value, array $types, bool $is)
    {
        foreach ($types as $type) {
            $this->assertSame($is, Type::test($value, $type));
        }
    }

    protected function is ($value, array $types): void
    {
        $this->evaluate($value, $types, true);
    }

    protected function isNot ($value, array $types): void
    {
        $this->evaluate($value, $types, false);
    }

    protected function check ($value, $type)
    {
        $this->is($value, Alias::of($type));
        $this->isNot($value, Alias::all($type));
    }
}
