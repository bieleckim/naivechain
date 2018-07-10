<?php

declare(strict_types=1);

namespace Naivechain\Tests\Query;

use Naivechain\Block;
use Naivechain\BlockChain;
use Naivechain\Query\GetBlocksQuery;
use PHPUnit\Framework\TestCase;

class GetBlocksQueryTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnBlockIndex(): void
    {
        $index = 0;
        $block = new Block($index, '', time(), '');
        $blockChain = new BlockChain([$block]);
        $query = new GetBlocksQuery($blockChain);

        $this->assertEquals($index, $query->run(''));
    }
}
