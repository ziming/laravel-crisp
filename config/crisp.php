<?php

declare(strict_types=1);

return [
    'website_id' => env('CRISP_WEBSITE_ID'),
    'tier' => env('CRISP_TIER', 'plugin'),
    'access_key_id' => env('CRISP_ACCESS_KEY_ID'),
    'secret_access_key' => env('CRISP_SECRET_ACCESS_KEY'),
];
