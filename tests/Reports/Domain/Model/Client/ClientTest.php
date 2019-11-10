<?php

namespace Pau\Reports\Domain\Model\Client;

use Pau\Reports\Domain\Model\Client\ValueObject\ClientId;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /** @test */
    public function it_should_create_and_return_client()
    {
        $clientId=new ClientId('122222ddcc');
        $reading[]= [
            "period"=>'1991-12',
            "reading"=>'233322'
            ];

        $client=Client::create($clientId,$reading);
        $this->assertInstanceOf(Client::class ,$client);

    }
}
