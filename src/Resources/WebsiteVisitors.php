<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsiteVisitors
{
    public function __construct(private CrispClient $client, private ?string $websiteId) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listVisitors(int $pageNumber = 1): array
    {
        return $this->client->websiteVisitors->listVisitors(
            $this->websiteId ?? config('crisp.website_id'),
            $pageNumber
        );
    }
}
