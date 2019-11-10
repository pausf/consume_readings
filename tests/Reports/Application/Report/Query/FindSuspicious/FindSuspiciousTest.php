<?php

namespace Pau\Test\Reports\Application\Report\Query\FindSuspicious;

use Pau\Reports\Domain\Model\Report\Report;
use Pau\Reports\Domain\Model\Report\ReportParser;
use Pau\Tests\Reports\Domain\Model\ReportUnitTest;

class FindSuspiciousTest extends ReportUnitTest
{
    /** @test */
    public function it_should_find_suspicious(): void
    {

        $reporParser=$this->createMock(ReportParser::class);
        $report=$this->getReport();
        $reporParser->method('parse')
            ->with('2016-reading.csv')
            ->willReturn($report);

        $this->assertInstanceOf(Report::class,$report);
        $this->assertSame($report,$reporParser->parser($report));

    }
}
