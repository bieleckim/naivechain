<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{
    /**
     * @see stream_socket_client
     * @var resource
     */
    private $socket;

    private static $peers = [];

    public function setUp(): void
    {
        $this->socket = stream_socket_client('tcp://127.0.0.1:1234');
    }

    /**
     * @test
     */
    public function canMakeConnection(): void
    {
        $this->assertEquals('stream', get_resource_type($this->socket));
    }

    /**
     * @test
     */
    public function canAddPeer(): void
    {
        $peer = '127.0.0.1:1235';
        static::$peers[] = $peer;

        fwrite($this->socket, 'ADD_PEER ' . $peer);
        $response = fread($this->socket, 1024);
        $this->assertEquals('PEER_ADDED ' . $peer, $response);
    }

    /**
     * @test
     */
    public function canGetPeers(): void
    {
        fwrite($this->socket, 'GET_PEERS');
        $response = fread($this->socket, 1024);
        $this->assertEquals(implode(' ', static::$peers), $response);
    }

    /**
     * @test
     */
    public function canGetGenesisBlock(): void
    {
        fwrite($this->socket, 'GET_BLOCKS');
        $response = fread($this->socket, 1024);
        $genesisBlockIndex = '0';

        $this->assertEquals($genesisBlockIndex, $response);
    }

    public function tearDown(): void
    {
        stream_socket_shutdown($this->socket, STREAM_SHUT_RDWR);
    }
}
