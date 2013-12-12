<?php

namespace Caveja\ToshlClient;

use Guzzle\Http\ClientInterface;

class Client
{
    /**
     * @var \Guzzle\Http\ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

}
