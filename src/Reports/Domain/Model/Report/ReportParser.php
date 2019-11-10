<?php

namespace Pau\Reports\Domain\Model\Report;

interface ReportParser
{
    public function parse(string $file):Report;
}