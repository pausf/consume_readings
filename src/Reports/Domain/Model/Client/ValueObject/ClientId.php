<?php

namespace Pau\Reports\Domain\Model\Client\ValueObject;

class ClientId
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

}