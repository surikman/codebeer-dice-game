<?php

declare(strict_types=1);

namespace App\Service;

use App\Value\DiceRollConfig;

final class DiceRollConfigProvider
{
    public function provide(): DiceRollConfig
    {
        return new DiceRollConfig(
            costPerRoll: 1,
            initialDiceCount: 3,
        );
    }
}