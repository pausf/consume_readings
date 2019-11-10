<?php

namespace Pau\Reports\Domain\Model\Client;

use Pau\Reports\Domain\Model\Client\ValueObject\ClientId;
use Pau\Reports\Domain\Model\Reading\Reading;
use Pau\Reports\Domain\Model\Reading\ValueObject\Consumption;
use Pau\Reports\Domain\Model\Reading\ValueObject\Period;
use Pau\Reports\Domain\Model\Reading\ValueObject\ReadingId;

class Client
{

    /** @var ClientId */
    private $id;

    /** @var Reading[] */
    private $readings;


    private function __construct(
        ClientId $id,
        array $readings=null
    )
    {
        $this->id = $id;
        $this->readings = $readings;
    }

    public static function create(ClientId $clientId,  array $readings): Client
    {

        usort($readings, function($a, $b)
        {
            return strcmp($a['reading'], $b['reading']);
        });

        $client=new Client($clientId);

        foreach ($readings as $reading){
            $reading=new Reading(new ReadingId(ReadingId::generate()),new Period($reading['period']),new Consumption($reading['reading']));
            $client->addReadings($reading);
        }

        return $client;
    }

    /**
     * @return Reading[]
     */
    public function suspicious(): array
    {
        $suspicousReading=[];

        foreach ($this->readings as $reading) {

            if($this->checkIfSuspicious($reading)){
                $suspicousReading[]=$reading;
            }

        }

        return $suspicousReading;
    }

    private function checkIfSuspicious($reading): bool
    {

       if( $reading->suspiciousOfHighReadings($this->median())){
           return true;
       }

       if( $reading->suspiciousOfLowReadings($this->median())){
           return true;
       }

       return false;
    }


    public function median()
    {
        return ($this->readings[5]->getConsumption()->value()+$this->readings[6]->getConsumption()->value())/2;
    }

    /**
     * @return ClientId
     */
    public function getId(): ClientId
    {
        return $this->id;
    }


    public function getReadings()
    {
        return $this->readings;
    }

    public function addReadings($reading)
    {
        return $this->readings[]=$reading;
    }

}