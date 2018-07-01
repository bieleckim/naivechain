<?php

declare(strict_types=1);

namespace Naivechain;

class Block
{
    /**
     * @var int
     */
    private $index;

    public function __construct(int $index)
    {
        $this->index = $index;
    }

    public function getIndex()
    {
        return $this->index;
    }
}
