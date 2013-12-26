<?php

namespace Caveja\ToshlClient\Client;

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

    /**
     * @return User
     */
    public function me()
    {
        $response = $this
            ->client
            ->get('/me')
            ->send()
        ;

        $data = $response->json();

        return new Me($data['id'], $data['email']);
    }
}
