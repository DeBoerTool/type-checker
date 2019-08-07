<?php declare(strict_types=1);

namespace Dbt\TypeChecker;

class Type implements IType
{
    /** @var mixed */
    private $value;

    /** @var ?string */
    private $type;

    /**
     * Type constructor.
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->type = null;
    }

    /**
     * @param mixed $value
     */
    public static function of ($value): IType
    {
        return new self($value);
    }

    /**
     * @param mixed $value
     * @param string $type
     * @return bool
     */
    public static function test ($value, string $type): bool
    {
        return self::of($value)->is($type);
    }

    public function mustBe (string $required): void
    {
        if (!$this->is($required)) {
            throw WrongType::of($required, $this->type());
        }
    }

    public function is (string $type): bool
    {
        if ($type === 'callable') {
            return is_callable($this->value);
        }

        if ($type === 'iterable') {
            return is_iterable($this->value);
        }

        if ($this->isClassOrInterface($type)) {
            return $this->value instanceof $type;
        }

        return Alias::is($type, $this->type());
    }

    private function isClassOrInterface (string $type): bool
    {
        return is_string($this->type())
            && (class_exists($type) || interface_exists($type));
    }

    private function type (): string
    {
        if (!$this->type) {
            $this->type = gettype($this->value);
        }

        return $this->type;
    }
}
