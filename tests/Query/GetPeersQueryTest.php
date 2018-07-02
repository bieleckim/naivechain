<?php

declare(strict_types=1);

namespace Naivechain\Tests\Query;

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
        $peers = ['a', 'b'];
        $peersImplodedWithSpace = implode(' ', $peers);
        $repository = new PeersRepository();
        $query = new GetPeersQuery($repository);

        foreach ($peers as $peer) {
            $repository->add($peer);
        }

        $this->assertEquals($peersImplodedWithSpace, $query->run(''));
    }
}
