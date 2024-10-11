<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MovieRepository;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    #[Route('/discover', name: 'movie_discover')]
    public function discover_category(MovieRepository $movieRepository, CategoryRepository $categoryRepository): Response
    {
        $movies = $movieRepository->findAll();
        $categories = $categoryRepository->findAll();

        return $this->render('discover.html.twig', [
            'movies' => $movies,
            'categories' => $categories
        ]);
    }

    #[Route('/category/{name}', name: 'show_category')]
    public function show_category(string $name): Response
    {
        return $this->render('category.html.twig', [
            'name' => $name
        ]);
    }

}
