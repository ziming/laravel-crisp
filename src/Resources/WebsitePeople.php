<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

final readonly class WebsitePeople
{
    public function __construct(private CrispClient $client, private ?string $websiteId = null) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findByEmail(string $email): array
    {
        return $this->client->websitePeople->findByEmail(
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
            $searchText
        );
    }

    /**
     *  Bonus Method
     *  Get list of people profiles that matches the search filter
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findWithSearchFilter(array $searchFilter): array
    {
        $websiteId = $this->websiteId ?? config('crisp.website_id');

        $result = $this->client->get(
            "website/{$websiteId}/people/profiles?search_filter=".urlencode(
                json_encode($searchFilter)
            )
        );

        return $this->formatResponse($result);
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function createNewPeopleProfile(array $params): array
    {
        return $this->client->websitePeople->createNewPeopleProfile(
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
            $peopleId,
            $data
        );
    }

    /**
     * Bonus Method
     * Get the first people ID by search text.
     * I may rename this method in the future as it does not feel right to me.
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getFirstPeopleIdBySearchText(string $searchText): ?string
    {
        $people = $this->client->websitePeople->findWithSearchText(
            $this->websiteId ?? config('crisp.website_id'),
            $searchText
        );

        return $people[0]['people_id'] ?? null;
    }

    /**
     * Bonus Method
     * Get the first people ID by search filter.
     * I may rename this method in the future as it does not feel right to me.
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getFirstPeopleIdBySearchFilter(array $searchFilter): ?string
    {
        $people = $this->findWithSearchFilter(
            $searchFilter,
        );

        return $people[0]['people_id'] ?? null;
    }

    /**
     * Bonus Method
     * Get the profile link for a given people ID.
     */
    public static function getProfileLink(string $peopleId, ?string $websiteId = null): string
    {
        $websiteId = $websiteId ?? config('crisp.website_id');

        return "https://app.crisp.chat/website/{$websiteId}/contacts/profile/{$peopleId}";
    }

    /**
     * Basically copied from Crisp own Resource class
     *
     * @throws CrispException
     */
    protected function formatResponse(ResponseInterface $response): array
    {
        $responseData = json_decode($response->getBody()->getContents(), true);

        if ($response->getStatusCode() >= 400) {
            throw new CrispException($response->getStatusCode(), $responseData);
        }

        return $responseData['data'];
    }
}
