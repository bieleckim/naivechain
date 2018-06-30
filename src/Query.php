<?php

declare(strict_types=1);

namespace Naivechain;

interface Query
{
    public function getName(): string;

    public function run(string $payload): void;
}
