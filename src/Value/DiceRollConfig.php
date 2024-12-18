<?php

declare(strict_types=1);

namespace App\Value;

final class DiceRollConfig
{
    public function __construct(
        public readonly int $costPerRoll,
        public readonly int $initialDiceCount,
    ) {
    }
}