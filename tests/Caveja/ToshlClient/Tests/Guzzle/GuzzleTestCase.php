<?php

namespace Caveja\ToshlClient\Tests\Guzzle;

use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Adapter\TransactionInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Message\RequestInterface;

abstract class GuzzleTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RequestInterface
     */
    protected $request;

    protected function buildMockClient(callable $response)
    {
        $mockAdapter = new MockAdapter(function (TransactionInterface $trans) use ($response) {
            $this->request = $trans->getRequest();

            return $response($trans);
        });

        return new Client(['adapter' => $mockAdapter]);
    }

    protected function tearDown()
    {
        $this->request = null;
    }

    protected function assertRequestPresent()
    {
        $this->assertInstanceOf('GuzzleHttp\\Message\\RequestInterface', $this->request);
    }
}
