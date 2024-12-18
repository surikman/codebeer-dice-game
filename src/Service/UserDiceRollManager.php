<?php

declare(strict_types=1);

namespace App\Service;

use App\Event\DiceRolled;
use App\Repository\UserRepository;
use Psr\EventDispatcher\EventDispatcherInterface;

final class UserDiceRollManager
{
    public function __construct(
        private readonly DiceRoller $roller,
        private readonly UserRepository $userRepository,
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly DiceRollConfigProvider $configProvider,
    ) {
    }

    public function performRoll(): int
    {
        $rolledNumber = $this->roller->roll();

        $user = $this->userRepository->getCurrent();

        $user->applyRoll($this->configProvider->provide(), $rolledNumber);

        $this->userRepository->save($user);
        $this->eventDispatcher->dispatch(new DiceRolled($user->getId(), $rolledNumber));

        return $rolledNumber;
    }
}