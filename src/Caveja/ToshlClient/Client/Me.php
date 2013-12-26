<?php

namespace Caveja\ToshlClient\Client;

/**
 * Class User
 * @package Caveja\ToshlClient\Client
 */
class Me
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @param int    $id
     * @param string $email
     */
    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
