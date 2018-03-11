<?php

namespace Naivechain;

/**
 * Class Server
 * @package Naivechain
 */
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
     * @see stream_socket_accept
     * @var resource
     */
    private $connection;

    /**
     * Server constructor.
     *
     * @param string $host
     * @param int $port
     */
    public function __construct(string $host, int $port)
    {
        $this->host = $host;
        $this->port = $port;
    }
    
    public function run(): void
    {
        $this->socket = stream_socket_server('tcp://'. $this->host . ':' . $this->port);

        while (true) {
            $this->connection = stream_socket_accept($this->socket);
            $this->handle();
            fclose($this->connection);
        }

        fclose($this->socket);
    }

    private function handle()
    {
        $request = $this->getRequest();
        var_export($request);
    }

    private function getRequest(): array
    {
        return json_decode(fread($this->connection, 1024), true);
    }
}
