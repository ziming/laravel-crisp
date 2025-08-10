<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp;

use Crisp\CrispClient;
use Ziming\LaravelCrisp\Resources\Buckets;
use Ziming\LaravelCrisp\Resources\PluginSubscriptions;
use Ziming\LaravelCrisp\Resources\UserProfile;
use Ziming\LaravelCrisp\Resources\Website;
use Ziming\LaravelCrisp\Resources\WebsiteAvailability;
use Ziming\LaravelCrisp\Resources\WebsiteConversations;
use Ziming\LaravelCrisp\Resources\WebsiteOperators;
use Ziming\LaravelCrisp\Resources\WebsitePeople;
use Ziming\LaravelCrisp\Resources\WebsiteSettings;
use Ziming\LaravelCrisp\Resources\WebsiteVerify;
use Ziming\LaravelCrisp\Resources\WebsiteVisitors;

final class LaravelCrisp
{
    public CrispClient $officialClient;

    public WebsitePeople $websitePeople;

    public WebsiteConversations $websiteConversations;

    public WebsiteSettings $websiteSettings;

    public WebsiteOperators $websiteOperators;

    public WebsiteVisitors $websiteVisitors;

    public WebsiteAvailability $websiteAvailability;

    public WebsiteVerify $websiteVerify;

    public UserProfile $userProfile;

    public PluginSubscriptions $pluginSubscriptions;

    public Buckets $buckets;

    public Website $website;

    public function __construct(
        ?string $websiteId = null,
        ?string $crispTier = null,
        #[\SensitiveParameter]
        ?string $accessKeyId = null,
        #[\SensitiveParameter]
        ?string $secretAccessKey = null,
    ) {
        $this->officialClient = new CrispClient;
        $this->officialClient->setTier(
            $crispTier ?? config('crisp.tier')
        );
        $this->officialClient->authenticate(
            $accessKeyId ?? config('crisp.access_key_id'),
            $secretAccessKey ?? config('crisp.secret_access_key')
        );

        // Initialize all resource classes
        $this->websitePeople = new WebsitePeople($this->officialClient, $websiteId);
        $this->websiteConversations = new WebsiteConversations($this->officialClient, $websiteId);
        $this->websiteSettings = new WebsiteSettings($this->officialClient, $websiteId);
        $this->websiteOperators = new WebsiteOperators($this->officialClient, $websiteId);
        $this->websiteVisitors = new WebsiteVisitors($this->officialClient, $websiteId);
        $this->websiteAvailability = new WebsiteAvailability($this->officialClient, $websiteId);
        $this->websiteVerify = new WebsiteVerify($this->officialClient, $websiteId);
        $this->userProfile = new UserProfile($this->officialClient);
        $this->pluginSubscriptions = new PluginSubscriptions($this->officialClient, $websiteId);
        $this->buckets = new Buckets($this->officialClient);
        $this->website = new Website($this->officialClient);
    }

    public function websitePeople(): WebsitePeople
    {
        return $this->websitePeople;
    }

    public function websiteConversations(): WebsiteConversations
    {
        return $this->websiteConversations;
    }

    public function websiteSettings(): WebsiteSettings
    {
        return $this->websiteSettings;
    }

    public function websiteOperators(): WebsiteOperators
    {
        return $this->websiteOperators;
    }

    public function websiteVisitors(): WebsiteVisitors
    {
        return $this->websiteVisitors;
    }

    public function websiteAvailability(): WebsiteAvailability
    {
        return $this->websiteAvailability;
    }

    public function websiteVerify(): WebsiteVerify
    {
        return $this->websiteVerify;
    }

    public function userProfile(): UserProfile
    {
        return $this->userProfile;
    }

    public function pluginSubscriptions(): PluginSubscriptions
    {
        return $this->pluginSubscriptions;
    }

    public function buckets(): Buckets
    {
        return $this->buckets;
    }

    public function website(): Website
    {
        return $this->website;
    }

    public function officialClient(): CrispClient
    {
        return $this->officialClient;
    }
}
