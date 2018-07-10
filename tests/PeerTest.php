<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use Naivechain\Peer;
use PHPUnit\Framework\TestCase;

class PeerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldHaveAddress()
    {
        $address = '127.0.0.1:1234';
        $peer = new Peer($address);
        $this->assertEquals($address, $peer->getAddress());
    }
}
