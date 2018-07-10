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
     * @var QueryResolver
     */
    private $queryResolver;

    public function __construct(string $host, int $port, QueryResolver $queryResolver)
    {
        $this->host = $host;
        $this->port = $port;
        $this->queryResolver = $queryResolver;
    }

    public function run(PeersRepository $peersRepository): void
    {
        $this->socket = stream_socket_server('tcp://' . $this->host . ':' . $this->port);

        while (true) {
            $this->handle();
        }

        fclose($this->socket);
    }

    private function handle(): void
    {
        $connection = stream_socket_accept($this->socket);
        $request = fread($connection, 1024);
        fwrite($connection, $this->queryResolver->resolve($request));
        fclose($connection);
    }
}
