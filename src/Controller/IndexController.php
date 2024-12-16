<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

#[Route('/')]
final class IndexController
{
    public function __invoke(Environment $twig): Response
    {
        return new Response($twig->render('base.html.twig'));
    }
}