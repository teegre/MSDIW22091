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

    return $this->render('artist/index.html.twig', [
    'controller_name' => 'ArtistController',
    'artist' => $artistRepository->find($id)
    ]);
  }
}
