<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use Naivechain\Query;
use Naivechain\QueryResolver;
use PHPUnit\Framework\TestCase;

class QueryResolverTest extends TestCase
{
    /**
     * @test
     * @throws \ReflectionException
     */
    public function shouldResolveQueryByName()
    {
        $queryMock = $this->createMock(Query::class);
        $queryName = 'sample';
        $queryPayload = 'payload';

        $queryMock
            ->method('getName')
            ->willReturn($queryName);

        $queryMock
            ->expects($this->once())
            ->method('run')
            ->with($queryPayload);

        $resolver = new QueryResolver([
            $queryMock
        ]);

        $resolver->resolve($queryName . ' ' . $queryPayload);
    }
}
