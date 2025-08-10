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
    public function __construct(private CrispClient $client, private ?string $websiteId = null) {}

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
            $this->websiteId ?? config('crisp.website_id'),
        );
    }

    /**
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function getSubscriptionDetails(string $pluginId): array
    {
        return $this->client->pluginSubscriptions->getSubscriptionDetails(
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
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
            $this->websiteId ?? config('crisp.website_id'),
            $pluginId
        );
    }

    /**
     * https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function saveSubscriptionSettings(string $pluginId, array $settings): array
    {
        return $this->client->pluginSubscriptions->saveSubscriptionSettings(
            $this->websiteId ?? config('crisp.website_id'),
            $pluginId,
            $settings
        );
    }
}
