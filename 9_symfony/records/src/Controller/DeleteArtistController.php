<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteArtistController extends AbstractController
{
    #[Route('/artist/{id}/delete', name: 'app_delete_artist', methods: ['GET', 'HEAD'])]
    #[IsGranted('ROLE_USER')]
    public function index(int $id, ArtistRepository $artistRepository): RedirectResponse
    {
      $artist = $artistRepository->find($id);
      if ($artist) {
        $artistRepository->remove($artist, true);
        $this->addFlash('notify', 'Artist successfully deleted.');
      } else {
        $this->addFlash('notify-error', 'Could not find artist id = '.$id.')');
      }

      return $this->redirectToRoute('app_artists');
    }
}
