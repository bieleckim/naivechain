<?php

declare(strict_types=1);

namespace Naivechain;

class PeersRepository
{
    private $peers = [];

    public function add(string $peer): void
    {
        $this->peers[] = $peer;
    }

    public function getPeers(): array
    {
        return $this->peers;
    }
}
