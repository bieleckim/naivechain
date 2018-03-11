<?php

declare(strict_types=1);

namespace Naivechain;

/**
 * Class Block
 * @package Naivechain
 */
class Block
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
     * @var string
     */
    private $hash;

    /**
     * @var \DateTimeInterface
     */
    private $timestamp;

    /**
     * @var string
     */
    private $data;

    /**
     * Block constructor.
     *
     * @param int $index
     * @param string $previousHash
     * @param string $hash
     * @param \DateTimeInterface $timestamp
     * @param string $data
     */
    public function __construct(
        int $index,
        string $previousHash,
        string $hash,
        \DateTimeInterface $timestamp,
        string $data
    ) {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->hash = $hash;
        $this->timestamp = $timestamp;
        $this->data = $data;
    }

    /**
     * @param array $array
     *
     * @return Block
     */
    public static function createFromArray(array $array): Block
    {
        return new static(
            $array['index'],
            $array['previousHash'],
            $array['hash'],
            $array['timestamp'],
            $array['data']
        );
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getPreviousHash(): string
    {
        return $this->previousHash;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getTimestamp(): \DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
}
