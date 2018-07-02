<?php

declare(strict_types=1);

namespace Naivechain\Tests;

use Naivechain\Query\Query;
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
        $queryResponse = 'response';

        $queryMock
            ->method('getName')
            ->willReturn($queryName);

        $queryMock
            ->expects($this->once())
            ->method('run')
            ->with($queryPayload)
            ->willReturn($queryResponse);

        $resolver = new QueryResolver([
            $queryMock
        ]);

        $this->assertEquals($queryResponse, $resolver->resolve($queryName . ' ' . $queryPayload));
    }

    /**
     * @test
     */
    public function shouldReturnUndefinedQueryWhenCanNotResolveQuery(): void
    {
        $resolver = new QueryResolver([]);
        $this->assertEquals('UNDEFINED_QUERY', $resolver->resolve('a b'));
    }
}
