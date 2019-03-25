<?php

namespace Dbt\TypeChecker\Tests;

use Dbt\TypeChecker\Tests\Fixtures\ClassFixture;
use Dbt\TypeChecker\Tests\Fixtures\Fixturable;
use Dbt\TypeChecker\Tests\Worlds\TypeTestWorld;
use Dbt\TypeChecker\Type;
use PHPUnit\Framework\TestCase;

class AdvancedTypeTest extends TestCase
{
    use TypeTestWorld;

    /** @test */
    public function checking_a_callable ()
    {
        $this->assertTrue(
            Type::of('strstr')->is('callable')
        );
    }

    /** @test */
    public function checking_an_iterable ()
    {
        $this->assertTrue(
            Type::of(['test'])->is('iterable')
        );
    }

    /** @test */
    public function checking_an_instance ()
    {
        $this->assertTrue(
            Type::of(new ClassFixture())->is(Fixturable::class)
        );

        $this->assertTrue(
            Type::of(new ClassFixture())->is(ClassFixture::class)
        );
    }
}
