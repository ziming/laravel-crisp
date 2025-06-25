<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class SystemEngine extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $version,
    ) {}
}
