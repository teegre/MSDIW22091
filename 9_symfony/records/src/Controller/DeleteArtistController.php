<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteArtistController extends AbstractController
{
    #[Route('/artist/{id}/delete', name: 'app_delete_artist', methods: ['GET', 'HEAD'])]
    public function index(int $id, ArtistRepository $artistRepository): RedirectResponse
    {
      $artist = $artistRepository->find($id);
      if ($artist) {
        $artistRepository->remove($artist, true);
        $this->addFlash('notify', 'Artist successfully deleted.');
      } else {
        $this->addFlash('notify-error', 'Artist not found (id :'.$id.')');
      }

      return $this->redirectToRoute('app_artists');
    }
}
