<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PlaylistRepository;
use App\Repository\PlaylistSubscriptionRepository;
use Symfony\Component\HttpFoundation\Request;

class MyListController extends AbstractController
{
    #[Route('/lists', name: 'show_my_list')]
    public function discover_category(
        playlistRepository $playlistRepository, 
        PlaylistSubscriptionRepository $playlistSubscriptionRepository,
        Request $request
        ): Response
    {

        $query = $request->query->get(key: 'playlist');

        $currentPlaylist = $playlistRepository -> find($query);

        $playlists = $playlistRepository->findAll();
        $subscriptions = $playlistSubscriptionRepository->findAll();
        return $this->render('lists.html.twig', [
            'playlists' => $playlists,
            'subscriptions' => $subscriptions,
            'currentPlaylist' => $currentPlaylist
        ]);
    }
}
