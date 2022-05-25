<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistsController extends AbstractController
{
    #[Route('/artists', name: 'app_artists', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(ArtistRepository $artistRepository): Response
    {
      $artists = $artistRepository->fetchAll();
      return $this->render('artists/index.html.twig', [
        'artists' => $artists,
      ]);
    }
}
