<?php

namespace Caveja\ToshlClient\Client;

use Guzzle\Http\ClientInterface as GuzzleClientInterface;

/**
 * Class User
 * @package Caveja\ToshlClient\Client
 */
class Me
{
    /**
     * @var GuzzleClientInterface
     */
    private $client;

    /**
     * @var array
     */
    private $data;

    /**
     * @param GuzzleClientInterface $client
     * @param array                 $data
     */
    public function __construct(GuzzleClientInterface $client, array $data)
    {
        $this->client = $client;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return boolean
     */
    public function isPro()
    {
        return $this->data['pro'];
    }
}
