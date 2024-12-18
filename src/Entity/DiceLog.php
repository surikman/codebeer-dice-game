<?php

namespace App\Entity;

use App\Repository\DiceLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiceLogRepository::class)]
class DiceLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct(
        #[ORM\Column]
        private int $userId,
        #[ORM\Column]
        private int $roll,
    ) {
    }
}
