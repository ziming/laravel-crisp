<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

readonly class WebsiteVerify
{
    public function __construct(private CrispClient $client)
    {
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSettings(): array
    {
        return $this->client->websiteVerify->getSettings(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getKey(): array
    {
        return $this->client->websiteVerify->getKey(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updateSettings(string $params): array
    {
        return $this->client->websiteVerify->updateSettings(
            config('crisp.website_id'),
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
            config('crisp.website_id')
        );
    }
}
