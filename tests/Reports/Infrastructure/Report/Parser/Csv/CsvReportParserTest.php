<?php

namespace Pau\Test\Reports\Infrastructure\Report\Parser\Csv;

use InvalidArgumentException;
use Pau\Reports\Domain\Model\Report\Report;
use Pau\Reports\Infrastructure\Report\Parser\Csv\CsvReportParser;
use PHPUnit\Framework\TestCase;

class CsvReportParserTest extends TestCase
{

    /** @test */
    public function it_should_not_exist_file()
    {
        $csvParser=new CsvReportParser();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('File does not exist.');
        $csvParser->parse('2017-readings.csv');
    }

    /** @test */
    public function it_should_return_type_report_csv()
    {
        $csvParser=new CsvReportParser();
        $report=$csvParser->parse('2016-readings.csv');
        $this->assertIsObject($report);
        $this->assertInstanceOf(Report::class ,$report);
    }
}
