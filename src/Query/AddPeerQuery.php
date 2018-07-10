<?php

declare(strict_types=1);

namespace Naivechain\Query;

use Naivechain\Peer;
use Naivechain\PeersRepository;

class AddPeerQuery implements Query
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
        return 'ADD_PEER';
    }

    public function run(?string $peer): string
    {
        $this->peersRepository->add(
            new Peer($peer)
        );

        return 'PEER_ADDED ' . $peer;
    }
}