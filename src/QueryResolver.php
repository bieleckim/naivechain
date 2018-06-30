<?php

declare(strict_types=1);

namespace Naivechain;

class QueryResolver
{
    /**
     * @var Query[]
     */
    private $queries;

    public function __construct(array $queries)
    {
        $this->queries = $queries;
    }

    public function resolve(string $request): void
    {
        list($queryName, $payload) = explode(' ', $request);

        foreach ($this->queries as $query) {
            if ($query->getName() === $queryName) {
                $query->run($payload);
            }
        }
    }
}
