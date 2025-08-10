<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Carbon\CarbonInterface;
use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;
use Ziming\LaravelCrisp\Data\CrispConversation;

final readonly class WebsiteConversations
{
    public function __construct(private CrispClient $client, private ?string $websiteId = null) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function findWithSearch(int $pageNumber = 1, string $searchQuery = '', string $searchType = '', string $searchOperator = '', string $includeEmpty = '', string $filterUnread = '', string $filterResolved = '', string $filterNotResolved = '', string $filterMention = '', string $filterAssigned = '', string $filterUnassigned = '', string $filterDateStart = '', string $filterDateEnd = '', string $orderDateCreated = '', string $orderDateUpdated = ''): array
    {
        return $this->client->websiteConversations->findWithSearch(
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
            $sessionId,
            $blocked
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function scheduleReminder(string $sessionId, string|CarbonInterface $date, string $note): array
    {
        $params = [
            'note' => $note,
        ];

        if ($date instanceof CarbonInterface) {
            $params['date'] = $date->toIso8601String();
        } else {
            $params['date'] = $date;
        }

        return $this->client->websiteConversations->scheduleReminder(
            $this->websiteId ?? config('crisp.website_id'),
            $sessionId,
            $params
        );
    }

    /**
     * Bonus Method
     * Get the crisp conversation for a given session.
     * Same as getOne but returns a CrispConversation data object
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getOneCrispConversation(string $sessionId): CrispConversation
    {
        return CrispConversation::from(
            $this->client->websiteConversations->getOne($this->websiteId ?? config('crisp.website_id'), $sessionId)
        );
    }

    /**
     * Bonus Method
     * Get the last message of a conversation. Which could be from operator or user
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getOneLastMessage(string $sessionId): string
    {
        $getOneResponse = $this->client->websiteConversations->getOne(
            $this->websiteId ?? config('crisp.website_id'),
            $sessionId
        );

        return $getOneResponse['last_message'];
    }

    /**
     * Bonus Method
     * Get the conversation link for a given session.
     */
    public static function getConversationLink(string $sessionId, ?string $websiteId = null): string
    {
        $websiteId = $websiteId ?? config('crisp.website_id');

        return "https://app.crisp.chat/website/{$websiteId}/inbox/{$sessionId}/";
    }
}
