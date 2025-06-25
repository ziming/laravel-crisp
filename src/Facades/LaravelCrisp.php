<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ziming\LaravelCrisp\LaravelCrisp
 */
final class LaravelCrisp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ziming\LaravelCrisp\LaravelCrisp::class;
    }
}
