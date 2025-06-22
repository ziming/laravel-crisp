<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp;

use Crisp\CrispClient;

class LaravelCrisp
{
    public CrispClient $crispClient {
        get {
            return $this->crispClient;
        }
    }

    public function __construct()
    {
        $this->crispClient = new CrispClient;
        $this->crispClient->setTier('plugin');
        $this->crispClient->authenticate(
            config('laravel-crisp.access_identifier'),
            config('laravel-crisp.secret_key')
        );
    }
}
