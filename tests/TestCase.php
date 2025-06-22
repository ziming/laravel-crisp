<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Ziming\LaravelCrisp\LaravelCrispServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelCrispServiceProvider::class,
        ];
    }
}
