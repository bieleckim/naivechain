<?php

declare(strict_types=1);

namespace Naivechain;

class Server
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @see stream_socket_server
     * @var resource
     */
    private $socket;

    /**
     * @var array
     */
    private $peers = [];

    public function __construct(string $host, int $port)
    {
        $this->host = $host;
        $this->port = $port;
    }

    public function run(): void
    {
        $this->socket = stream_socket_server('tcp://'. $this->host . ':' . $this->port);

        while (true) {
            $this->handle();
        }

        fclose($this->socket);
    }

    private function handle(): void
    {
        $connection =  stream_socket_accept($this->socket);
        $data = fread($connection, 1024);

        if (strpos($data, 'ADD_PEER') === 0) {
            list(, $peer) = explode(' ', $data);
            $this->peers[] = $peer;
            fwrite($connection, 'PEER_ADDED ' . $peer);
        }

        if (strpos($data, 'GET_PEERS') === 0) {
            fwrite($connection, implode(' ', $this->peers));
        }

        fclose($connection);
    }
}
