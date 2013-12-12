<?php

namespace Caveja\ToshlClient;

use Guzzle\Http\ClientInterface;

/**
 * Class Client
 * @package Caveja\ToshlClient
 */
class Client
{
    /**
     * @var \Guzzle\Http\ClientInterface
     */
    private $client;

    /**
     * Constructor
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}
