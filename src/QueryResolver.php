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

    public function resolve(string $request): string
    {
        list($queryName, $payload) = explode(' ', $request);

        foreach ($this->queries as $query) {
            if ($query->getName() === $queryName) {
                return $query->run($payload);
            }
        }

        return 'UNDEFINED_QUERY';
    }
}
