<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class Meta extends Data
{
    public function __construct(
        public readonly string $nickname,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $address,
        public readonly ?string $subject,
        public string $origin,
        public readonly string $ip,
        public readonly ?Connection $connection,
        public readonly array $data,
        public readonly ?string $avatar,
        public readonly Device $device,

    ) {}
}
