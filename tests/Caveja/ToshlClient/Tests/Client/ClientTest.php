<?php

namespace Caveja\ToshlClient\Tests\Client;

use Caveja\ToshlClient\Client\Client;
use Caveja\ToshlClient\Tests\Guzzle\GuzzleTestCase;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

/**
 * Class ClientTest
 * @package Caveja\ToshlClient\Tests\Client
 */
class ClientTest extends GuzzleTestCase
{
    public function testMe()
    {

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
        $client = new Client($this->buildMockClient(function () use ($json) {
            $body = Stream::factory($json);

            return new Response(200, ['Content-type' => 'application/json'], $body);
        }), 'DEAD-BEEF');

        $obj = json_decode($json);

        $user = $client->me();

        $this->assertEquals($obj->id, $user->getId(), 'User ID should match');
        $this->assertEquals($obj->email, $user->getEmail(), 'Email should match');

        $this->assertEquals($obj->first_name, $user->getFirstName());
        $this->assertEquals($obj->last_name, $user->getLastName());

        $this->assertFalse($user->isPro());
        $this->assertNull($user->proUntil());
        $this->assertSame('USD', $user->getMainCurrency());
        $this->assertSame('EUR', $user->getActiveCurrency());
        $this->assertSame(1.31, $user->getActiveCurrencyRate());
        $this->assertNull($user->getExtra());
        $this->assertSame(5, $user->getStartDay());
    }
}
