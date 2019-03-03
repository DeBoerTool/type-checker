<?php

namespace Dbt\TypeChecker;

class Type
{
    /** @var mixed */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function of ($value): Type
    {
        return new self($value);
    }

    public static function test ($value, string $type): bool
    {
        return self::of($value)->is($type);
    }

    public function is (string $type): bool
    {
        if ($type === 'callable') {
            return is_callable($this->value);
        }

        if ($this->isClassOrInterface($type)) {
            return $this->value instanceof $type;
        }

        return Alias::is($type, $this->type());
    }

    private function isClassOrInterface (string $type): bool
    {
        return is_string($type)
            && (class_exists($type) || interface_exists($type));
    }

    private function type (): string
    {
        return gettype($this->value);
    }
}
