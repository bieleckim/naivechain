<?php

declare(strict_types=1);

namespace Naivechain;

/**
 * Class BlockChain
 * @package Naivechain
 */
class BlockChain
{
    /**
     * @var Server
     */
    private $server;

    /**
     * BlockChain constructor.
     *
     * @param Server $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }
}
