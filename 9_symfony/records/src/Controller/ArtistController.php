<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
  #[Route('/artist/{id}', name: 'app_artist', methods: ['GET', 'HEAD'])]
  public function index(int $id, ArtistRepository $artistRepository): Response
  {
    $artist = $artistRepository->find($id);

    if ($artist) {
      return $this->render('artist/index.html.twig', [
        'artist' => $artist,
      ]);
    } else {
      $this->addFlash('notify-error', 'Could not find an artist with id: '.$id);
      return $this->redirectToRoute('app_artists');
    }
  }
}
