<?php

namespace Pau\Reports\Domain\Model\Reading;

use Pau\Reports\Domain\Model\Reading\ValueObject\Consumption;
use Pau\Reports\Domain\Model\Reading\ValueObject\Period;
use Pau\Reports\Domain\Model\Reading\ValueObject\ReadingId;
use phpDocumentor\Reflection\Types\Boolean;

class Reading
{

    /** @var ReadingId */
    private $id;

    /** @var Period */
    private $period;

    /** @var Consumption */
    private $consumption;


    public function __construct(
        ReadingId $id,
        Period $period,
        Consumption $consumption
    )
    {
        $this->id = $id;
        $this->period = $period;
        $this->consumption = $consumption;
    }



    public function suspiciousOfHighReadings($median)
    {
        if($this->getConsumption()->value()>($median*1.5)){
            return true;
        }
    }

    public function suspiciousOfLowReadings($median)
    {
        if($this->getConsumption()->value()<($median*0.5)){
            return true;
        }
    }


    public function getId(): ReadingId
    {
        return $this->id;
    }


    public function getPeriod(): Period
    {
        return $this->period;
    }


    public function getConsumption(): Consumption
    {
        return $this->consumption;
    }


}