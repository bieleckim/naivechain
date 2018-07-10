<?php

declare(strict_types=1);

namespace Naivechain;

class Block
{
    /**
     * @var int
     */
    private $index;

    /**
     * @var string
     */
    private $previousHash;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var string
     */
    private $hash;

    public function __construct(int $index, string $previousHash, int $timestamp, string $hash)
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->timestamp = $timestamp;
        $this->hash = $hash;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getPreviousHash(): string
    {
        return $this->previousHash;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

}
