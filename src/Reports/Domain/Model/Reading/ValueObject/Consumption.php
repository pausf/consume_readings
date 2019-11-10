<?php

namespace Pau\Reports\Domain\Model\Reading\ValueObject;

class Consumption
{
    private $value;

    public function __construct(string $value)
    {

        $this->value = $value;
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