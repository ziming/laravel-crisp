<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

/**
 * @internal
 * Not ready for public use yet. Still fine-tuning it
 */
class CrispConversation extends Data
{
    public function __construct(
        public string $session_id,
        public string $website_id,
        public string $people_id,
        public int $status, // alias of state but not too clear about what it means
        public string $state,
        public bool $is_verified,
        public bool $is_blocked,
        public string $availability,
        public array $active, // object
        public string $last_message,
        public ?array $preview_message, // object
        public array $mentions,
        public array $participants,
        public int $updated_at, // Not sure how to get it to work with CarbonImmutable so using int for now
        public int $created_at, // Not sure how to get it to work with CarbonImmutable so using int for now

        public array $unread, // object

        public array $assigned, // object,

        public array $meta, // object

        public array $segments,
    ) {}
}
