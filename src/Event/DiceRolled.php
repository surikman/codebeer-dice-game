<?php

declare(strict_types=1);

namespace App\Event;

final class DiceRolled
{
    public function __construct(
        public readonly int $userId,
        public readonly int $rolledNumber,
    ) {
    }
}