<?php

namespace Dbt\TypeChecker\Tests;

use Dbt\TypeChecker\Alias;
use PHPUnit\Framework\TestCase;

class AliasTest extends TestCase
{
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
        $this->assertCount(15, Alias::all());
    }

    /** @test */
    public function getting_all_aliases_except_one ()
    {
        $this->assertNotContains('string', Alias::all('string'));
        $this->assertCount(13, Alias::all('string'));
    }
}
