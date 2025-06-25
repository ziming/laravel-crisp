<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

/**
 * @internal
 * Not ready for public use yet. Still fine-tuning it
 */
class CrispMessage extends Data
{
    public function __construct(
        public readonly string $session_id,
        public readonly string $website_id,
        public readonly string $type,
        public readonly string $from,
        public readonly string $origin,
        public readonly string|array $content,
        public readonly array $preview,
        public readonly array $mentions,
        public readonly bool $stamped,
        public readonly string $read,
        public readonly string $delivered,
        public readonly int $fingerprint,
        public readonly CarbonImmutable $timestamp,

        public readonly array $user, // object
    ) {}
}
