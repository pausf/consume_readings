<?php

namespace Pau\Test\Reports\Domain\Model\Report;

use function Lambdish\Phunctional\search;
use Pau\Reports\Domain\Model\Reading\Reading;
use Pau\Reports\Domain\Model\Reading\ValueObject\Consumption;
use Pau\Reports\Domain\Model\Reading\ValueObject\Period;
use Pau\Reports\Domain\Model\Reading\ValueObject\ReadingId;
use Pau\Reports\Domain\Model\Report\DTO\ReportDTO;
use Pau\Reports\Domain\Model\Report\Report;
use Pau\Tests\Reports\Domain\Model\ReportUnitTest;

class ReportTest extends ReportUnitTest
{

    /** @test */
    public function it_should_create_from_primitives_and_return_report()
    {

        $reading['1122334455']= [
            [
                "period"=>"1991-12",
                "reading"=>"233322"
            ],
            [
                "period"=>"1991-11",
                "reading"=>"22333"
            ]
        ];

        $report=Report::fromPrimitives($reading);
        $this->assertInstanceOf(Report::class,$report);
    }

    /** @test */
    public function it_should_return_dto(){

        $report=$this->getReport();
        $reports=$report->getSuspiciousClients();
        $this->assertIsArray($reports);
        $this->assertInstanceOf(ReportDTO::class,$reports[0]);

    }

    /** @test */
    public function it_should_suspicious_reading(){

        $report=$this->getReport();
        $clients=$report->getClients();

        $clients['583ef6329d7b9']->addReadings(
            new Reading(new ReadingId(ReadingId::generate()),new Period("2016-04"),new Consumption('3562'))
        );

        $reportDTO=$report->getSuspiciousClients();

        $result=search(
            function (ReportDTO $reportDTO) {
                return '3562' === $reportDTO->getSuspicious();
            },
            $reportDTO
        );

        $this->assertSame($result->getSuspicious(),"3562");

    }




}
