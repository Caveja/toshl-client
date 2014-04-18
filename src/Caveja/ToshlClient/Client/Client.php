<?php

namespace Caveja\ToshlClient\Client;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;

/**
 * Class Client
 * @package Caveja\ToshlClient
 */
class Client implements ClientInterface
{
    /**
     * @var GuzzleClientInterface
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

    /**
     * @return User
     */
    public function me()
    {
        $response = $this
            ->client
            ->get('/me')
        ;

        return new Me($this->client, $response->json());
    }
}
