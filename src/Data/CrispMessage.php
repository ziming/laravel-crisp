<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

/**
 * @internal
 * Not ready for public use yet. Still fine-tuning it
 */
final class CrispMessage extends Data
{
    public function __construct(
        public readonly string $session_id,
        public readonly string $website_id,
        public readonly string $type,
        public readonly string $from,
        public readonly string $origin,

        /**
         * Message content (string if type is text or note, object if type is file, animation, audio, picker, field,
         * carousel or event)
         */
        public readonly string|array $content,

        public readonly array $preview,

        public readonly bool $stamped,
        public readonly bool $edited,
        public readonly bool $translated,
        public readonly bool $automated,

        public readonly array $mentions,
        public readonly string $read,
        public readonly string $delivered,
        public readonly ?array $ignored,

        public readonly int $fingerprint,
        public readonly int $timestamp, // Not sure how to get it to work with CarbonImmutable so using int for now

        public readonly array $user, // object

        public readonly ?array $references,
        public readonly ?array $original,
    ) {}
}
