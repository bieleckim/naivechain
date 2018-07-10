<?php

declare(strict_types=1);

namespace Naivechain;

class Peer
{
    /**
     * @var string
     */
    private $address;

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
