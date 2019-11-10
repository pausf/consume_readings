<?php

namespace Pau\Reports\Domain\Model\Client\DTO;

class ClientDTO
{
    /** @var string */
    private $clientId;

    /** @var array[] */
    private $reading;

    public function __construct(string $clientId, array $reading)
    {
        $this->clientId = $clientId;
        $this->reading = $reading;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return array[]
     */
    public function getReading(): array
    {
        return $this->reading;
    }


}