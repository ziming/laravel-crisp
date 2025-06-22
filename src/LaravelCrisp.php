<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp;

use Crisp\CrispClient;
use Ziming\LaravelCrisp\Resources\WebsitePeople;

class LaravelCrisp
{
    public CrispClient $client {
        get {
            return $this->client;
        }
    }

    public WebsitePeople $websitePeople;

    public function __construct()
    {
        $this->client = new CrispClient;
        $this->client->setTier('plugin');
        $this->client->authenticate(
            config('crisp.access_identifier'),
            config('crisp.secret_key')
        );

        $this->websitePeople = new WebsitePeople($this->client);
    }

    public static function getProfileLink(string $peopleId): string
    {
        return 'https://app.crisp.chat/website/'.config('crisp.website_id')."/contacts/profile/{$peopleId}";
    }
}
