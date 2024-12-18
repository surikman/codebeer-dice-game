<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Event\PlayerRegistered;
use App\Repository\UserRepository;
use App\Service\DiceRollConfigProvider;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(PlayerRegistered::class)]
final class AssignDice
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly DiceRollConfigProvider $configProvider,
    ) {
    }

    public function __invoke(PlayerRegistered $registered): void
    {
        $user = $this->userRepository->getCurrent();
        $user->initializeDiceCount($this->configProvider->provide());

        $this->userRepository->save($user);
    }
}