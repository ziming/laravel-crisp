<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

readonly class WebsiteConversations
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findWithSearch(int $pageNumber = 1, string $searchQuery = '', string $searchType = '', string $searchOperator = '', string $includeEmpty = '', string $filterUnread = '', string $filterResolved = '', string $filterNotResolved = '', string $filterMention = '', string $filterAssigned = '', string $filterUnassigned = '', string $filterDateStart = '', string $filterDateEnd = '', string $orderDateCreated = '', string $orderDateUpdated = ''): array
    {
        return $this->client->websiteConversations->findWithSearch(
            config('crisp.website_id'),
            $pageNumber,
            $searchQuery,
            $searchType,
            $searchOperator,
            $includeEmpty,
            $filterUnread,
            $filterResolved,
            $filterNotResolved,
            $filterMention,
            $filterAssigned,
            $filterUnassigned,
            $filterDateStart,
            $filterDateEnd,
            $orderDateCreated,
            $orderDateUpdated
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getList(int $pageNumber = 1): array
    {
        return $this->client->websiteConversations->getList(
            config('crisp.website_id'),
            $pageNumber
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function create(): array
    {
        return $this->client->websiteConversations->create(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getOne(string $sessionId): array
    {
        return $this->client->websiteConversations->getOne(
            config('crisp.website_id'),
            $sessionId
        );
    }

    /**
     * Delete a conversation
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function deleteOne(string $sessionId): array
    {
        return $this->client->websiteConversations->deleteOne(
            config('crisp.website_id'),
            $sessionId
        );
    }

    /**
     * Initiate a conversation
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function initiateOne(string $sessionId): array
    {
        return $this->client->websiteConversations->initiateOne(
            config('crisp.website_id'),
            $sessionId
        );
    }

    /**
     * Get messages from a conversation
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getMessages(string $sessionId, string $timestampBefore = ''): array
    {
        return $this->client->websiteConversations->getMessages(
            config('crisp.website_id'),
            $sessionId,
            $timestampBefore
        );
    }

    /**
     * Send a message in a conversation
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function sendMessage(string $sessionId, array $message): array
    {
        return $this->client->websiteConversations->sendMessage(
            config('crisp.website_id'),
            $sessionId,
            $message
        );
    }

    /**
     * Acknowledge messages in a conversation
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function acknowledgeMessages(string $sessionId, array $read): array
    {
        return $this->client->websiteConversations->acknowledgeMessages(
            config('crisp.website_id'),
            $sessionId,
            $read
        );
    }

    /**
     * Get routing for a conversation
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getRouting(string $sessionId): array
    {
        return $this->client->websiteConversations->getRouting(
            config('crisp.website_id'),
            $sessionId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function assignRouting(string $sessionId, array $routing): array
    {
        return $this->client->websiteConversations->assignRouting(
            config('crisp.website_id'),
            $sessionId,
            $routing
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getMeta(string $sessionId): array
    {
        return $this->client->websiteConversations->getMeta(
            config('crisp.website_id'),
            $sessionId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function updateMeta(string $sessionId, array $metas): array
    {
        return $this->client->websiteConversations->updateMeta(
            config('crisp.website_id'),
            $sessionId,
            $metas
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getOriginalMessage(string $sessionId, string $originalId): array
    {
        return $this->client->websiteConversations->getOriginalMessage(
            config('crisp.website_id'),
            $sessionId,
            $originalId
        );
    }

    /**
     * Set the state of a conversation
     *
     * @param  string  $state  Must be one of: 'pending', 'unresolved', 'resolved'
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function setState(string $sessionId, string $state): array
    {
        return $this->client->websiteConversations->setState(
            config('crisp.website_id'),
            $sessionId,
            $state
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function setBlock(string $sessionId, bool $blocked = true): array
    {
        return $this->client->websiteConversations->setBlock(
            config('crisp.website_id'),
            $sessionId,
            $blocked
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function scheduleReminder(string $sessionId, array $params): array
    {
        return $this->client->websiteConversations->scheduleReminder(
            config('crisp.website_id'),
            $sessionId,
            $params
        );
    }
}
