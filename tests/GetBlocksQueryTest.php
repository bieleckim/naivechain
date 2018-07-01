<?php

namespace Naivechain\Tests;

use Naivechain\Block;
use Naivechain\BlockChain;
use Naivechain\GetBlocksQuery;
use PHPUnit\Framework\TestCase;

class GetBlocksQueryTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnBlockIndex(): void
    {
        $index = 0;
        $block = new Block($index);
        $blockChain = new BlockChain([$block]);
        $query = new GetBlocksQuery($blockChain);

        $this->assertEquals($index, $query->run(''));
    }
}
