<?php

namespace Dbt\TypeChecker\Tests;

use Dbt\TypeChecker\Tests\Worlds\TypeTestWorld;
use PHPUnit\Framework\TestCase;

class BasicTypeTest extends TestCase
{
    use TypeTestWorld;

    /** @test */
    public function checking_a_string ()
    {
        $this->check('some string', 'string');
    }

    /** @test */
    public function checking_an_int ()
    {
        $this->check(12, 'integer');
    }
    
    /** @test */
    public function checking_a_float ()
    {
        $this->check(12.0, 'double');
    }

    /** @test */
    public function checking_a_bool ()
    {
        $this->check(false, 'boolean');
    }

    /** @test */
    public function checking_an_array ()
    {
        $this->check([], 'array');
    }

    /** @test */
    public function checking_an_object ()
    {
        $this->check(new class {}, 'object');
    }

    /** @test */
    public function checking_a_resource ()
    {
        $dir = opendir('/');

        $this->check($dir, 'resource');

        closedir($dir);
    }

    /** @test */
    public function checking_null ()
    {
        $this->check(null, 'NULL');
    }
}
