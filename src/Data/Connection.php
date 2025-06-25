<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class Connection extends Data
{
    public function __construct(
        public readonly string $isp,
        public readonly string $asn,
    ) {}
}
