<?php

namespace Pau\Reports\Domain\Model\Reading\ValueObject;

use DateTime;
use Pau\Reports\Domain\Model\Reading\Exceptions\DateFormatIsNotValidException;

class Period
{
    private $value;

    public function __construct(string $value)
    {
        $this->guardIsValidDate($value);
        $this->value = $value;
    }

    private function guardIsValidDate($value): void
    {
        $date=DateTime::createFromFormat('Y-m', $value);

        if($date->format('Y-m')!=$value)
        {
            throw new DateFormatIsNotValidException('Date is not valid');
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function month(): string
    {
        $date=DateTime::createFromFormat('Y-m', $this->value());
        return $date->format('F');
    }

    public function __toString()
    {
        return $this->value();
    }
}