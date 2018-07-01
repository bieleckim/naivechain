<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use Naivechain\Block;
use Naivechain\BlockChain;
use PHPUnit\Framework\TestCase;

class BlockChainTest extends TestCase
{
    /**
     * @test
     */
    public function canHaveChainWithBlocks(): void
    {
        $block = new Block(0);
        $chain = [$block];

        $blockChain = new BlockChain($chain);
        $this->assertEquals($chain, $blockChain->getChain());
    }
}