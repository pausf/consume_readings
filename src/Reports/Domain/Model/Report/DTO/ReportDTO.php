<?php

namespace Pau\Reports\Domain\Model\Report\DTO;

class ReportDTO
{

    /** @var string */
    private $client;

    /** @var string */
    private $month;

    /** @var string */
    private $suspicious;

    /** @var string */
    private $median;

    public function __construct(string $client, string $month, string $suspicious, string $median)
    {
        $this->client = $client;
        $this->month = $month;
        $this->suspicious = $suspicious;
        $this->median = $median;
    }

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @return string
     */
    public function getSuspicious(): string
    {
        return $this->suspicious;
    }

    /**
     * @return string
     */
    public function getMedian(): string
    {
        return $this->median;
    }

}