<?php

declare(strict_types=1);

namespace Naivechain\Tests\Query;

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
        $peer = 'peer';
        $peers = [$peer];
        $repository = new PeersRepository();
        $query = new AddPeerQuery($repository);

        $query->run($peer);

        $this->assertEquals($peers, $repository->getPeers());
    }
}
