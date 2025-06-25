<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsiteSettings
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function get(): array
    {
        return $this->client->websiteSettings->get(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function update(string $params): array
    {
        return $this->client->websiteSettings->update(
            config('crisp.website_id'),
            $params
        );
    }
}
