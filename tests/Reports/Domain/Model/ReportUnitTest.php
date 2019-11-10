<?php

namespace Pau\Tests\Reports\Domain\Model;

use Pau\Reports\Domain\Model\Report\Report;
use Pau\Reports\Infrastructure\Report\Parser\Csv\CsvReportParser;
use PHPUnit\Framework\TestCase;

abstract class ReportUnitTest extends TestCase
{


    public function getReport():Report
    {
        $csvParser=new CsvReportParser();
        return $csvParser->parse('2016-readings.csv');

    }
}