<?php
/**
 * Created by PhpStorm.
 * User: davide
 * Date: 26/12/13
 * Time: 1.50
 */

namespace Caveja\ToshlClient\Tests\Client;

use Caveja\ToshlClient\Client\LinkBag;

class LinkBagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LinkBag
     */
    private $bag;

    protected function setUp()
    {
        $this->bag = new LinkBag();
    }

    public function testIsCountable()
    {
        $this->assertInstanceOf('\\Countable', $this->bag);
    }

    public function testCount()
    {
        $this->assertSame(0, $this->bag->count());
        $this->bag->set('me', '/me');
        $this->assertSame(1, $this->bag->count());
    }

    public function testSetGet()
    {
        $this->bag->set('me', '/me');
        $this->assertSame('/me', $this->bag->get('me'));
    }
}
