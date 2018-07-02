<?php

declare(strict_types=1);

namespace Naivechain\Query;

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
        return implode(' ', $this->peersRepository->getPeers());
    }
}