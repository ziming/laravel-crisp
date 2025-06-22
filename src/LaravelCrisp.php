<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp;

use Crisp\CrispClient;

class LaravelCrisp
{
    public CrispClient $client {
        get {
            return $this->client;
        }
    }

    public function __construct()
    {
        $this->client = new CrispClient;
        $this->client->setTier('plugin');
        $this->client->authenticate(
            config('crisp.access_identifier'),
            config('crisp.secret_key')
        );
    }
}
