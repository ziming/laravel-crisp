<?php

declare(strict_types=1);

namespace Ziming\LaravelCrisp\Enums;

enum ConversationStatus: int
{
    case Pending = 0;
    case Unresolved = 1;
    case Resolved = 2;
}
