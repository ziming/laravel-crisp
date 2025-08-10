<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsiteAvailability
{
    public function __construct(private CrispClient $client, private ?string $websiteId) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getAvailabilityStatus(): array
    {
        return $this->client->websiteAvailability->getAvailabilityStatus(
            $this->websiteId ?? config('crisp.website_id'),
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listOperatorAvailabilities(): array
    {
        return $this->client->websiteAvailability->listOperatorAvailabilities(
            $this->websiteId ?? config('crisp.website_id'),
        );
    }
}
