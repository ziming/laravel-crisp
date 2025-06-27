<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class Geolocation extends Data
{
    public function __construct(
        public readonly ?string $country,
        public readonly ?string $region,
        public readonly ?string $city,
        public readonly ?Coordinates $coordinates,
    ) {}
}
