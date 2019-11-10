<?php

namespace Pau\Reports\Domain\Model\Report;

use Pau\Reports\Domain\Model\Client\Client;
use Pau\Reports\Domain\Model\Client\ValueObject\ClientId;
use Pau\Reports\Domain\Model\Report\DTO\ReportDTO;
use Pau\Reports\Domain\Model\Report\ValueObject\ReportId;

class Report
{
    /** @var ReportId */
    private $id;

    /** @var Client[] */
    private $clients=[];

    private function __construct(
        ReportId $id,
        array $clients)
    {
        $this->id = $id;
        $this->clients= $clients;
    }

    public static function fromPrimitives(array $readings):Report
    {
        $clients=[];
        foreach ($readings as $clientId => $reading ){
            $clients[$clientId]= Client::create(new ClientId($clientId),$reading);
        }

        return new self(new ReportId(ReportId::generate()),$clients);
    }

    /**
     * @return ReportDTO[]
     */
    public function getSuspiciousClients(): array
    {
        $report=[];

        foreach ($this->clients as $client){

            if($client->suspicious()) {

                $report=array_merge($report,$this->transformData($client,$client->suspicious()));
            }
        }

        return $report;
    }

    /**
     * @return ReportDTO[]
     */
    private function transformData($client,$readings): array
    {

        $report=[];
        foreach($readings as $reading)
        {
            $report[]=new ReportDTO(
               $client->getId()->value(),
               $reading->getPeriod()->month(),
               $reading->getConsumption()->value(),
               $client->median()
           );
        }

        return $report;
    }


    public function getId(): ReportId
    {
        return $this->id;
    }


    /**
     * @return Client[]
     */
    public function getClients(): array
    {
        return $this->clients;
    }

}