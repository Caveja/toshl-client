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
     * @var string
     */
    private $clientId;

    /**
     * Constructor
     * @param GuzzleClientInterface $client
     * @param string                $clientId
     */
    public function __construct(GuzzleClientInterface $client, $clientId)
    {
        $this->client = $client;
        $this->clientId = $clientId;
    }
}
