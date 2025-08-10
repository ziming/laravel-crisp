<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsiteSettings
{
    public function __construct(private CrispClient $client, private ?string $websiteId = null) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function get(): array
    {
        return $this->client->websiteSettings->get(
            $this->websiteId ?? config('crisp.website_id'),
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function update(string $params): array
    {
        return $this->client->websiteSettings->update(
            $this->websiteId ?? config('crisp.website_id'),
            $params
        );
    }
}
