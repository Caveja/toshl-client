<?php

namespace Caveja\ToshlClient\Tests\Client;

use Caveja\ToshlClient\Client\Client;
use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Tests\GuzzleTestCase;
use \stdClass;

/**
 * Class ClientTest
 * @package Caveja\ToshlClient\Tests\Client
 */
class ClientTest extends GuzzleTestCase {

    /**
     * @var GuzzleClient
     */
    private $guzzle;

    /**
     * @var Client
     */
    private $client;

    protected function setUp()
    {
        $this->guzzle = new GuzzleClient('https://api.test.com/');
        $this->client = new Client($this->guzzle, 'DEAD-BEEF');
    }

    public function testMe() {
        $mock = new MockPlugin();


        $json =<<<EOT
{
    "id": 42,
    "email": "john@example.com",
    "first_name": "John",
    "last_name": "Cleese",
    "joined": "2013-06-19T16:23:05+00:00Z",
    "pro": false,
    "pro_until": null,
    "main_currency": "USD",
    "active_currency": {
        "currency": "EUR",
        "rate": 1.31
    },
    "start_day": 5,
    "links": [
        {
            "rel": "self",
            "href": "\/me"
        },
        {
            "rel": "month",
            "href": "\/months\/2013\/6"
        },
        {
            "rel": "expenses",
            "href": "\/expenses?from=2013-06-01&to=2013-07-01"
        },
        {
            "rel": "incomes",
            "href": "\/incomes?from=2013-06-01&to=2013-07-01"
        },
        {
            "rel": "budgets",
            "href": "\/budgets"
        }
    ],
    "extra": null
}
EOT;
        $obj = json_decode($json);
        $mock->addResponse(new Response(200, array('Content-type', 'application/json'), $json));

        $this->guzzle->addSubscriber($mock);
        $user = $this->client->getUser();

        $this->assertEquals($obj->id, $user->getId(), 'User ID should match');
        $this->assertEquals($obj->email, $user->getEmail(), 'Email should match');
    }
}