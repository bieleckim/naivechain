<?php

declare(strict_types=1);

namespace Naivechain;

use Naivechain\Query\Query;

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
        $requestParts = explode(' ', $request);
        $queryName = $requestParts[0];
        $payload = $requestParts[1] ?? '';

        foreach ($this->queries as $query) {
            if ($query->getName() === $queryName) {
                return $query->run($payload);
            }
        }

        return 'UNDEFINED_QUERY';
    }
}
