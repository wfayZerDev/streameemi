<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MovieRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function __invoke(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findAll();

        return $this->render('index.html.twig', [
            'movies' => $movies,
        ]);
    }
}

