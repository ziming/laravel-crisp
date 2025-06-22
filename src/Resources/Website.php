<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

readonly class Website
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function create(array $params): array
    {
        return $this->client->website->create($params);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function delete(string $websiteId): array
    {
        return $this->client->website->delete($websiteId);
    }
}
