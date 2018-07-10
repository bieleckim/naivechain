<?php

declare(strict_types=1);

namespace Naivechain;

class PeersRepository
{
    /**
     * @var Peer[]
     */
    private $peers = [];

    public function __construct(array $peers = [])
    {
        $this->peers = $peers;
    }

    public function add(Peer $peer): void
    {
        $this->peers[] = $peer;
    }

    public function getPeers(): array
    {
        return $this->peers;
    }
}
