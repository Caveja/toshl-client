<?php
namespace Caveja\ToshlClient\Client;

/**
 * Class LinkBag
 * @package Caveja\ToshlClient\Client
 */
class LinkBag implements \Countable
{
    /**
     * @var array
     */
    private $links = array();

    /**
     * @return int
     */
    public function count()
    {
        return count($this->links);
    }

    /**
     * @param string $rel
     * @param string $href
     */
    public function set($rel, $href)
    {
        $this->links[$rel] = $href;
    }

    /**
     * @param $rel
     * @return string
     */
    public function get($rel)
    {
        return $this->links[$rel];
    }
}
