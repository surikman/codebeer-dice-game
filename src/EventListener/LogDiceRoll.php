<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Event\DiceRolled;
use App\Message\CreateDiceLog;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsEventListener(DiceRolled::class)]
final class LogDiceRoll
{
    public function __construct(
        private readonly MessageBusInterface $messageBus,
    ) {
    }

    public function __invoke(DiceRolled $rolled): void
    {
        $this->messageBus->dispatch(new CreateDiceLog($rolled->userId, $rolled->rolledNumber));
    }
}