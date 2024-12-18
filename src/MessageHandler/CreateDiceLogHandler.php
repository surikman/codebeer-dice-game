<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Entity\DiceLog;
use App\Message\CreateDiceLog;
use App\Repository\DiceLogRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateDiceLogHandler
{
    public function __construct(
        private readonly DiceLogRepository $logRepository,
    ) {
    }

    public function __invoke(CreateDiceLog $createDiceLog): void
    {
        $this->logRepository->save(new DiceLog($createDiceLog->userId, $createDiceLog->rolledNumber));
    }
}