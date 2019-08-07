<?php

namespace Dbt\TypeChecker;

interface IType
{
    /**
     * @param mixed $value
     */
    public static function of ($value): IType;

    /**
     * @param mixed $value
     */
    public static function test ($value, string $type): bool;

    public function is (string $type): bool;

    public function mustBe (string $required): void;
}
