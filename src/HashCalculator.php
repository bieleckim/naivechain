<?php

declare(strict_types=1);

namespace Naivechain;

/**
 * Class HashCalculator
 * @package Naivechain
 */
class HashCalculator
{
    /**
     * @var integer
     */
    private $index;

    /**
     * @var string
     */
    private $previousHash;

    /**
     * @var \DateTimeInterface
     */
    private $timestamp;

    /**
     * @var string
     */
    private $data;

    /**
     * HashCalculator constructor.
     *
     * @param int $index
     * @param string $previousHash
     * @param \DateTimeInterface $timestamp
     * @param string $data
     */
    public function __construct(int $index, string $previousHash, \DateTimeInterface $timestamp, string $data)
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->timestamp = $timestamp;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function calculate(): string
    {
        return hash(
            'sha256',
            $this->index . $this->previousHash . $this->timestamp->getTimestamp() . $this->data
        );
    }
}
