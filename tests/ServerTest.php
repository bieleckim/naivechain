<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{
    /**
     * @test
     */
    public function canMakeConnection()
    {
        $socket = stream_socket_client('tcp://127.0.0.1:1234');
        $this->assertEquals('stream', get_resource_type($socket));
        stream_socket_shutdown($socket, STREAM_SHUT_RDWR);
    }
}
