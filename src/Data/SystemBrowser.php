<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class SystemBrowser extends Data
{
    public function __construct(
        public readonly ?string $major,
        public readonly ?string $version,
        public readonly ?string $name,
    ) {}
}
