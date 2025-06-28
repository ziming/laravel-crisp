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

    public function __construct()
    {
        $this->officialClient = new CrispClient;
        $this->officialClient->setTier(config('crisp.tier'));
        $this->officialClient->authenticate(
            config('crisp.access_key_id'),
            config('crisp.secret_access_key')
        );

        // Initialize all resource classes
        $this->websitePeople = new WebsitePeople($this->officialClient);
        $this->websiteConversations = new WebsiteConversations($this->officialClient);
        $this->websiteSettings = new WebsiteSettings($this->officialClient);
        $this->websiteOperators = new WebsiteOperators($this->officialClient);
        $this->websiteVisitors = new WebsiteVisitors($this->officialClient);
        $this->websiteAvailability = new WebsiteAvailability($this->officialClient);
        $this->websiteVerify = new WebsiteVerify($this->officialClient);
        $this->userProfile = new UserProfile($this->officialClient);
        $this->pluginSubscriptions = new PluginSubscriptions($this->officialClient);
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
