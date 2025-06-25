<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsiteOperators
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getList(): array
    {
        return $this->client->websiteOperators->getList(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getOne(string $operatorId): array
    {
        return $this->client->websiteOperators->getOne(
            config('crisp.website_id'),
            $operatorId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function deleteOne(string $operatorId): array
    {
        return $this->client->websiteOperators->deleteOne(
            config('crisp.website_id'),
            $operatorId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updateOne(string $operatorId, array $params): array
    {
        return $this->client->websiteOperators->updateOne(
            config('crisp.website_id'),
            $operatorId,
            $params
        );
    }
}
