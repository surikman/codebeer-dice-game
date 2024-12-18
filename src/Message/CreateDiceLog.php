<?php

declare(strict_types=1);

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage]
final class CreateDiceLog
{
    public function __construct(
        public readonly int $userId,
        public readonly int $rolledNumber,
    ) {
    }
}