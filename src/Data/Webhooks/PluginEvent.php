<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data\Webhooks;

use Spatie\LaravelData\Data;

/**
 * @internal Not Ready Yet. Do not use!
 */
final class PluginEvent extends Data
{
    public function __construct(
        public readonly string $website_id,
        public readonly string $event,
        public readonly array $data,
        public readonly int $timestamp,
    ) {}
}
