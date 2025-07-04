<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class SystemOperatingSystem extends Data
{
    public function __construct(
        public readonly ?string $version,
        public readonly ?string $name,
    ) {}
}
