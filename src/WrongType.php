<?php

namespace Dbt\TypeChecker;

use Exception;

class WrongType extends Exception
{
    /** @var string */
    public static $format =
        'The given value must be of type %s. Instead it was %s.';

    public static function of (string $required, string $actual): self
    {
        return new self(sprintf(self::$format, $required, $actual));
    }
}
