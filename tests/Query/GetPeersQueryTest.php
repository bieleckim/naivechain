<?php

declare(strict_types=1);

namespace Naivechain\Tests\Query;

use Naivechain\Peer;
use Naivechain\Query\GetPeersQuery;
use Naivechain\PeersRepository;
use PHPUnit\Framework\TestCase;

class GetPeersQueryTest extends TestCase
{
    /**
     * @test
     */
    public function shouldGetPeersFromRepository(): void
    {
        $peers = [new Peer('a'), new Peer('b')];
        $peersImplodedWithSpace = implode(' ', array_map(function ($peer) {
            /** @var Peer $peer */
            return $peer->getAddress();
        }, $peers));

        $repository = new PeersRepository();
        $query = new GetPeersQuery($repository);

        foreach ($peers as $peer) {
            $repository->add($peer);
        }

        $this->assertEquals($peersImplodedWithSpace, $query->run(''));
    }
}
