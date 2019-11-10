<?php

namespace Pau\Reports\Infrastructure\Report\Parser\Xml;

use Pau\Reports\Domain\Model\Report\Report;
use Pau\Reports\Domain\Model\Report\ReportParser;

class XmlReportParser implements ReportParser
{

    public function parse(string $file):Report
    {
        $reader=new Reader(__DIR__."/File/".$file);
        $data=$reader->read();
        $report=Report::fromPrimitives($data);

        return $report;
    }
}