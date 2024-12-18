<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\UserDiceRollManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsCsrfTokenValid;
use Throwable;

class GameController extends AbstractController
{
    #[Route('/game', name: 'app_game:index')]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'dice_count' => $userRepository->getCurrent()->availableRolls(),
        ]);
    }

    #[Route('/game/roll-dice', name: 'app_game:roll_dice')]
    #[IsCsrfTokenValid('roll-dice', 'token')]
    public function rollDice(UserDiceRollManager $rollManager): Response
    {
        try {
            $rolledNumber = $rollManager->performRoll();
            $this->addFlash('message', sprintf('You rolled a %s', $rolledNumber));
        } catch (Throwable $e) {
            $this->addFlash('error', $e->getMessage());
        }

        return $this->redirectToRoute('app_game:index');
    }
}
