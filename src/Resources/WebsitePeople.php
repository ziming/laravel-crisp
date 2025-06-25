<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

final readonly class WebsitePeople
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findByEmail(string $email): array
    {
        return $this->client->websitePeople->findByEmail(
            config('crisp.website_id'),
            $email
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findWithSearchText(string $searchText): array
    {
        return $this->client->websitePeople->findWithSearchText(
            config('crisp.website_id'),
            $searchText
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function createNewPeopleProfile(array $params): array
    {
        return $this->client->websitePeople->createNewPeopleProfile(
            config('crisp.website_id'),
            $params
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function checkPeopleProfileExists(string $peopleId): bool
    {
        return $this->client->websitePeople->checkPeopleProfileExists(
            config('crisp.website_id'),
            $peopleId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getPeopleProfile(string $peopleId): array
    {
        return $this->client->websitePeople->getPeopleProfile(
            config('crisp.website_id'),
            $peopleId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleProfiles(int $pageNumber = 1): array
    {
        return $this->client->websitePeople->listPeopleProfiles(
            config('crisp.website_id'),
            $pageNumber
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function removePeopleProfile(string $peopleId): array
    {
        return $this->client->websitePeople->removePeopleProfile(
            config('crisp.website_id'),
            $peopleId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function savePeopleProfile(string $peopleId, array $data): array
    {
        return $this->client->websitePeople->savePeopleProfile(
            config('crisp.website_id'),
            $peopleId,
            $data
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updatePeopleProfile(string $peopleId, array $data): array
    {
        return $this->client->websitePeople->updatePeopleProfile(
            config('crisp.website_id'),
            $peopleId,
            $data
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleSegments(int $pageNumber = 1): array
    {
        return $this->client->websitePeople->listPeopleSegments(
            config('crisp.website_id'),
            $pageNumber
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleConversations(string $peopleId, int $pageNumber = 1): array
    {
        return $this->client->websitePeople->listPeopleConversations(
            config('crisp.website_id'),
            $peopleId,
            $pageNumber
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function addPeopleEvent(string $peopleId, array $data): array
    {
        return $this->client->websitePeople->addPeopleEvent(
            config('crisp.website_id'),
            $peopleId,
            $data,
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listPeopleEvents(string $peopleId, int $pageNumber = 1): array
    {
        return $this->client->websitePeople->listPeopleEvent(
            config('crisp.website_id'),
            $peopleId,
            $pageNumber
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getPeopleData(string $peopleId): array
    {
        return $this->client->websitePeople->getPeopleData(
            config('crisp.website_id'),
            $peopleId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function savePeopleData(string $peopleId, array $data): array
    {
        return $this->client->websitePeople->savePeopleData(
            config('crisp.website_id'),
            $peopleId,
            $data
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updatePeopleData(string $peopleId, array $data): array
    {
        return $this->client->websitePeople->updatePeopleData(
            config('crisp.website_id'),
            $peopleId,
            $data
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getPeopleSubscriptionStatus(string $peopleId): array
    {
        return $this->client->websitePeople->getPeopleSubscriptionStatus(
            config('crisp.website_id'),
            $peopleId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updatePeopleSubscriptionStatus(string $peopleId, array $data): array
    {
        return $this->client->websitePeople->updatePeopleSubscriptionStatus(
            config('crisp.website_id'),
            $peopleId,
            $data
        );
    }

    /**
     * Bonus Method
     * Get the first people ID by search text.
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getFirstPeopleIdBySearchText(string $searchText): ?string
    {
        $people = $this->client->websitePeople->findWithSearchText(
            config('crisp.website_id'),
            $searchText
        );

        return $people[0]['people_id'] ?? null;
    }

    /**
     * Bonus Method
     * Get the profile link for a given people ID.
     */
    public static function getProfileLink(string $peopleId): string
    {
        return 'https://app.crisp.chat/website/'.config('crisp.website_id')."/contacts/profile/{$peopleId}";
    }
}
