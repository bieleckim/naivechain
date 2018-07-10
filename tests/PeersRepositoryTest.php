<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use Naivechain\Peer;
use Naivechain\PeersRepository;
use PHPUnit\Framework\TestCase;

class PeersRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function canAddPeer()
    {
        $peer = new Peer('127.0.0.1:1234');
        $peers = [$peer, $peer];
        $repository = new PeersRepository([$peer]);

        $repository->add($peer);

        $this->assertEquals($peers, $repository->getPeers());
    }
}
