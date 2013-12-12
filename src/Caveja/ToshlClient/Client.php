<?php

namespace Caveja\ToshlClient;

use Guzzle\Http\ClientInterface as GuzzleClientInterface;

/**
 * Class Client
 * @package Caveja\ToshlClient
 */
class Client implements ClientInterface
{
    /**
     * @var \Guzzle\Http\ClientInterface
     */
    private $client;

    /**
     * Constructor
     * @param GuzzleClientInterface $client
     */
    public function __construct(GuzzleClientInterface $client)
    {
        $this->client = $client;
    }
}
