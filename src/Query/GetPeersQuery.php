<?php

declare(strict_types=1);

namespace Naivechain\Query;

use Naivechain\Peer;
use Naivechain\PeersRepository;

class GetPeersQuery implements Query
{
    /**
     * @var PeersRepository
     */
    private $peersRepository;

    public function __construct(PeersRepository $peersRepository)
    {
        $this->peersRepository = $peersRepository;
    }

    public function getName(): string
    {
        return 'GET_PEERS';
    }

    public function run(?string $payload): string
    {
        return implode(' ', array_map(function ($peer) {
            /** @var Peer $peer */
            return $peer->getAddress();
        }, $this->peersRepository->getPeers()));
    }
}