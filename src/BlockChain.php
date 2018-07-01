<?php

declare(strict_types=1);

namespace Naivechain;

class BlockChain
{
    /**
     * @var Block[]
     */
    private $chain;

    /**
     * @param Block[] $chain
     */
    public function __construct(array $chain)
    {
        $this->chain = $chain;
    }

    public function getChain(): array
    {
        return $this->chain;
    }
}
