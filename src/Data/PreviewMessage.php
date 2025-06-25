<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

/**
 * @internal
 * Not ready for public use yet. Still fine-tuning it
 */
final class PreviewMessage extends Data
{
    public function __construct(
        public readonly string $type,
        public readonly string $from,
        public readonly string $excerpt,
        public readonly int $fingerprint,
    ) {}
}
