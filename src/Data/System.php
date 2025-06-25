<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Data;

use Spatie\LaravelData\Data;

final class System extends Data
{
    public function __construct(
        public readonly SystemOperatingSystem $os,
        public readonly SystemEngine $engine,
        public readonly SystemBrowser $browser,
    ) {}
}
