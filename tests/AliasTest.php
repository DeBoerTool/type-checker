<?php

namespace Dbt\TypeChecker\Tests;

use Dbt\TypeChecker\Alias;
use Dbt\TypeChecker\Tests\Worlds\AliasTestWorld;
use PHPUnit\Framework\TestCase;

class AliasTest extends TestCase
{
    use AliasTestWorld;

    /** @test */
    public function checking_an_alias_with_an_existing_original ()
    {
        $this->assertTrue(
            Alias::is('str', 'string')
        );

        $this->assertFalse(
            Alias::is('test', 'string')
        );
    }

    /** @test */
    public function checking_an_nonexistent_original ()
    {
        $this->assertFalse(
            Alias::is('str', 'nope')
        );
    }

    /** @test */
    public function getting_all_aliases ()
    {
        $this->assertCount(17, Alias::all());
    }

    /** @test */
    public function getting_all_aliases_except_one ()
    {
        $this->assertNotContains('string', Alias::all('string'));
        $this->assertCount(15, Alias::all('string'));
    }

    /**
     * @test
     * @dataProvider validTypesProvider
     */
    public function checking_if_a_type_is_valid ($types)
    {
        foreach ($types as $type) {
            $this->assertTrue(
                Alias::isValid($type)
            );
        }
    }

    /**
     * @test
     * @dataProvider invalidTypesProvider
     */
    public function checking_if_a_type_is_invalid ($types)
    {
        foreach ($types as $type) {
            $this->assertFalse(
                Alias::isValid($type)
            );
        }
    }
}
