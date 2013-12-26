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

    /**
     * First name getter
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->data['first_name'];
    }

    /**
     * Last name getter
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->data['last_name'];
    }

    /**
     * @return \DateTime|null
     */
    public function proUntil()
    {
        if (null === $this->data['pro_until']) {
            return null;
        }

        return new \DateTime($this->data['pro_until']);
    }

    /**
     * Main currency getter
     *
     * @return string
     */
    public function getMainCurrency()
    {
        return $this->data['main_currency'];
    }

    /**
     * Active currency getter
     *
     * @return string
     */
    public function getActiveCurrency()
    {
        return $this->data['active_currency']['currency'];
    }

    /**
     * Active currency rate getter
     *
     * @return string
     */
    public function getActiveCurrencyRate()
    {
        return $this->data['active_currency']['rate'];
    }

    /**
     * Extra data, up to 255 characters
     *
     * @return mixed
     */
    public function getExtra()
    {
        return $this->data['extra'];
    }

    /**
     * Start date getter
     *
     * @return integer
     */
    public function getStartDay()
    {
        return $this->data['start_day'];
    }
}
