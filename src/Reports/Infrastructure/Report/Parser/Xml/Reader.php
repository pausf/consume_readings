<?php

namespace Pau\Reports\Infrastructure\Report\Parser\Xml;

class Reader
{

    public function __construct($xml = null)
    {
        $this->checkFile($xml);
        $this->xml = $xml;
    }


    public function checkFile($xml)
    {
        if (file_exists($xml) !== true) {
            throw new \InvalidArgumentException("File does not exist.");
        }
    }

    public function read(): array
    {
        $xml = simplexml_load_file($this->xml);
        $arrayData=[];
        foreach ($xml->reading as $reading)
        {
            $attr = $reading->attributes();

            $arrayData[(string)$attr['clientID']][]=[
                'period'=>(string)$attr['period'],
                'reading'=>(string)$reading[0],
            ];

        }

        return $arrayData;
    }


}