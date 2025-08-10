<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsiteVerify
{
    public function __construct(private CrispClient $client, private ?string $websiteId) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSettings(): array
    {
        return $this->client->websiteVerify->getSettings(
            $this->websiteId ?? config('crisp.website_id'),
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getKey(): array
    {
        return $this->client->websiteVerify->getKey(
            $this->websiteId ?? config('crisp.website_id'),
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updateSettings(string $params): array
    {
        return $this->client->websiteVerify->updateSettings(
            $this->websiteId ?? config('crisp.website_id'),
            $params
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function rollKey(): array
    {
        return $this->client->websiteVerify->rollKey(
            $this->websiteId ?? config('crisp.website_id'),
        );
    }
}
