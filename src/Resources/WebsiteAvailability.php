<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

readonly class WebsiteAvailability
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getAvailabilityStatus(): array
    {
        return $this->client->websiteAvailability->getAvailabilityStatus(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listOperatorAvailabilities(): array
    {
        return $this->client->websiteAvailability->listOperatorAvailabilities(
            config('crisp.website_id')
        );
    }
}
