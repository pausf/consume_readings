<?php

namespace Pau\Reports\Infrastructure\Report\Parser\Csv;

class Reader
{

    /**
     * @var string $csv
     */
    protected $csv;

    /**
     * @var string $delimiter
     */
    protected $delimiter;

    public function __construct( $csv= null,$delimiter =  ",")
    {
        $this->checkFile($csv);
        $this->csv = $csv;
        $this->delimiter = $delimiter;
    }


    public function checkFile($csv)
    {
        if (file_exists($csv) !== true) {
            throw new \InvalidArgumentException("File does not exist.");
        }
    }

    public function read(): array
    {

        $header=null;
        $fh = fopen($this->csv, 'r');

        $arrayData=[];
        while(!feof($fh)) {

            $line = trim(fgets($fh));
            $data = explode($this->delimiter, $line);

            if($header==null){
                $header= $data;
                continue;
            }

            $arrayData[$data[0]][]=[
                $header[1]=>$data[1],
                $header[2]=>$data[2],
            ];

        }

        fclose($fh);

        return $arrayData;
    }

}