<?php

namespace Caveja\ToshlClient\Client;
use Caveja\ToshlClient\Client\Me;

/**
 * Interface ClientInterface
 * @package Caveja\ToshlClient
 */
interface ClientInterface
{
    /**
     * @return Me
     */
    public function me();

    /**
     * @return Budgets
     */
    public function budgets();
}
