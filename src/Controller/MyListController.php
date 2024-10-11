<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PlaylistRepository;
use App\Repository\PlaylistSubscriptionRepository;

class MyListController extends AbstractController
{
    #[Route('/lists', name: 'show_my_list')]
    public function discover_category(playlistRepository $playlistRepository, PlaylistSubscriptionRepository $playlistSubscriptionRepository): Response
    {
        $playlists = $playlistRepository->findAll();
        $subscriptions = $playlistSubscriptionRepository->findAll();
        return $this->render('lists.html.twig', [
            'playlists' => $playlists,
            'subscriptions' => $subscriptions
        ]);
    }
}
