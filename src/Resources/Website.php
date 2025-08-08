<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class Website
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function create(string $name, string $domain): array
    {
        $params = [
            'name' => $name,
            'domain' => $domain,
        ];

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
