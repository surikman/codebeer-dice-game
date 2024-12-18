<?php

declare(strict_types=1);

namespace App\Service;

final class DiceRoller
{
    public function roll(): int
    {
        return random_int(1, 6);
    }
}