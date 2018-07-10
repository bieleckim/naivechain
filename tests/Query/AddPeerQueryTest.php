<?php

declare(strict_types=1);

namespace Naivechain\Tests\Query;

use Naivechain\Peer;
use Naivechain\Query\AddPeerQuery;
use Naivechain\PeersRepository;
use PHPUnit\Framework\TestCase;

class AddPeerQueryTest extends TestCase
{
    /**
     * @test
     */
    public function shouldAddPeerToRepository(): void
    {
        $peer = new Peer('127.0.0.1:1234');
        $peers = [$peer];
        $repository = new PeersRepository();
        $query = new AddPeerQuery($repository);

        $query->run($peer->getAddress());

        $this->assertEquals($peers, $repository->getPeers());
    }
}
