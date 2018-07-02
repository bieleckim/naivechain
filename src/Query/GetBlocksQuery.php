<?php

declare(strict_types=1);

namespace Naivechain\Query;

use Naivechain\Block;
use Naivechain\BlockChain;

class GetBlocksQuery implements Query
{
    /**
     * @var BlockChain
     */
    private $blockChain;

    public function __construct(BlockChain $blockChain)
    {
        $this->blockChain = $blockChain;
    }

    public function getName(): string
    {
        return 'GET_BLOCKS';
    }

    public function run(?string $payload): string
    {
        return implode(' ', array_map(function ($block) {
            /** @var Block $block */
            return $block->getIndex();
        }, $this->blockChain->getChain()));
    }
}
