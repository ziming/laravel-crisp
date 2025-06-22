<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp;

use Crisp\CrispClient;
use Ziming\LaravelCrisp\Resources\{
    Buckets,
    PluginSubscriptions,
    UserProfile,
    Website,
    WebsiteAvailability,
    WebsiteConversations,
    WebsiteOperators,
    WebsitePeople,
    WebsiteSettings,
    WebsiteVerify,
    WebsiteVisitors
};

class LaravelCrisp
{
    public CrispClient $client;

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
        $this->client = new CrispClient;
        $this->client->setTier('plugin');
        $this->client->authenticate(
            config('crisp.access_identifier'),
            config('crisp.secret_key')
        );

        // Initialize all resource classes
        $this->websitePeople = new WebsitePeople($this->client);
        $this->websiteConversations = new WebsiteConversations($this->client);
        $this->websiteSettings = new WebsiteSettings($this->client);
        $this->websiteOperators = new WebsiteOperators($this->client);
        $this->websiteVisitors = new WebsiteVisitors($this->client);
        $this->websiteAvailability = new WebsiteAvailability($this->client);
        $this->websiteVerify = new WebsiteVerify($this->client);
        $this->userProfile = new UserProfile($this->client);
        $this->pluginSubscriptions = new PluginSubscriptions($this->client);
        $this->buckets = new Buckets($this->client);
        $this->website = new Website($this->client);
    }
}
