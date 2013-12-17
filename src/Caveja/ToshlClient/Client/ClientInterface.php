<?php

namespace Caveja\ToshlClient\Client;
use Caveja\ToshlClient\Model\User;

/**
 * Interface ClientInterface
 * @package Caveja\ToshlClient
 */
interface ClientInterface
{
    /**
     * @return User
     */
    function getUser();
}
