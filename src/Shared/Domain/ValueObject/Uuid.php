<?php

namespace Pau\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid as Ramsey;

class Uuid
{

    private $value;

    public function __construct(string $value)
    {
        $this->guardIsValidUuid($value);
        $this->value = $value;
    }


    private function guardIsValidUuid($id): void
    {
        if (!Ramsey::isValid($id)) {
            throw new \InvalidArgumentException($id.'is not a valid value');
        }
    }

    public static function generate(): self
    {
        return new self(Ramsey::uuid4()->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }
}