<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class Device extends Data
{
    public function __construct(
        public readonly ?array $capabilities,
        public readonly ?Geolocation $geolocation,
        public readonly ?System $system,
        public readonly ?int $timezone,
        public readonly ?array $locales,
    ) {}
}
