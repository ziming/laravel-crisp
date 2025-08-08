<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * @see https://docs.crisp.chat/references/rest-api/v1/#plugin-subscription
 */
final readonly class PluginSubscriptions
{
    public function __construct(private CrispClient $client) {}

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listAllActiveSubscriptions(): array
    {
        return $this->client->pluginSubscriptions->listAllActiveSubscriptions();
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function listSubscriptionsForWebsite(): array
    {
        return $this->client->pluginSubscriptions->listSubscriptionsForWebsite(
            config('crisp.website_id')
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSubscriptionDetails(string $pluginId): array
    {
        return $this->client->pluginSubscriptions->getSubscriptionDetails(
            config('crisp.website_id'),
            $pluginId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function subscribeWebsiteToPlugin(string $pluginId): array
    {
        return $this->client->pluginSubscriptions->subscribeWebsiteToPlugin(
            config('crisp.website_id'),
            $pluginId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function unsubscribePluginFromWebsite(string $pluginId): array
    {
        return $this->client->pluginSubscriptions->unsubscribePluginFromWebsite(
            config('crisp.website_id'),
            $pluginId
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSubscriptionSettings(string $pluginId): array
    {
        return $this->client->pluginSubscriptions->getSubscriptionSettings(
            config('crisp.website_id'),
            $pluginId
        );
    }

    /**
     * https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function saveSubscriptionSettings(string $pluginId, array $settings): array
    {
        return $this->client->pluginSubscriptions->saveSubscriptionSettings(
            config('crisp.website_id'),
            $pluginId,
            $settings
        );
    }
}
