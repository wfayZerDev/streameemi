<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MediaRepository;

class MovieController extends AbstractController
{
    #[Route('/media/{id}', name: 'movie_list')]
    public function index(MediaRepository $mediaRepository, int $id): Response
    {
        $media = $mediaRepository->find($id);

        if (!$media) {
            throw $this->createNotFoundException('The media does not exist');
        }

        return $this->render('movie/detail.html.twig', [
            'media' => $media,
        ]);

    }
}