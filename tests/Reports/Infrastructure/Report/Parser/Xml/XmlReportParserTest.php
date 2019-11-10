<?php

namespace Pau\Tests\Reports\Infrastructure\Report\Parser\Xml;

use InvalidArgumentException;
use Pau\Reports\Domain\Model\Report\Report;
use Pau\Reports\Infrastructure\Report\Parser\Xml\XmlReportParser;
use PHPUnit\Framework\TestCase;

class XmlReportParserTest extends TestCase
{
    /** @test */
    public function it_should_not_exist_file_xml()
    {
        $xmlParse=new XmlReportParser();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('File does not exist.');
        $xmlParse->parse('2016-reading.xml');

    }

    /** @test */
    public function it_should_return_type_report_xml()
    {
        $xmlParse=new XmlReportParser();
        $report=$xmlParse->parse('2016-readings.xml');
        $this->assertIsObject($report);
        $this->assertInstanceOf(Report::class ,$report);
    }

}