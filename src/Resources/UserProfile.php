<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

readonly class UserProfile
{
    public function __construct(private CrispClient $client)
    {
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function get(): array
    {
        return $this->client->userProfile->get();
    }

    /**
     * Update the current user's profile
     *
     * @param array $params Profile data to update
     * @return array
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function update(array $params): array
    {
        return $this->client->userProfile->update($params);
    }
}
