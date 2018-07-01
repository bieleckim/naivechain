<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use Naivechain\PeersRepository;
use PHPUnit\Framework\TestCase;

class PeersRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function canAddPeer()
    {
        $peer = 'peer';
        $peers = [$peer];
        $repository = new PeersRepository();

        $repository->add($peer);

        $this->assertEquals($peers, $repository->getPeers());
    }
}
