<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Resources;

use Crisp\CrispClient;
use Crisp\CrispException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * @see https://docs.crisp.chat/references/rest-api/v1/#bucket-url
 */
final readonly class Buckets
{
    public function __construct(private CrispClient $client) {}

    /**
     * https://docs.crisp.chat/references/rest-api/v1/#bucket-url
     *
     * @throws CrispException
     * @throws ClientExceptionInterface
     */
    public function generate(array $data): array
    {
        return $this->client->buckets->generate($data);
    }
}
