<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

#[Route('/')]
final class IndexController
{
    public function __construct(
        private readonly Environment $twig,
    ) {
    }

    public function __invoke(): Response
    {
        return new Response($this->twig->render('base.html.twig'));
    }
}