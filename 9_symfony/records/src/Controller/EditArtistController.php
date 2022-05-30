<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Artist;
use App\Form\ArtistType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditArtistController extends AbstractController
{
  #[Route('/artist/{id}/edit', name: 'app_edit_artist')]
  #[IsGranted('ROLE_USER')]
  public function index(Request $request, int $id, EntityManagerInterface $em): Response
  {
    $artist = $em->find(Artist::class, $id);

    if (!$artist) {
      $this->addFlash('notify-error', 'Invalid artist id ('.$id.')');
      return $this->redirectToRoute('app_artists');
    }

    $form = $this->createForm(ArtistType::class, $artist);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $artist = $form->getData();
      $picture = $form->get('artist_img')->getData();

      if ($picture) {
        $filename = strtolower($form->get('artist_name')->getData());
        $newFilename = str_replace(' ', '_', $filename).'.'.$picture->guessExtension();
      }

      try {
        $picture->move(
          $this->getParameter('pictures_directory'),
          $newFilename
        );
      } catch (FileException $e) {
        $this->addFlash('notify-error', $e->getMessage());
        return $this->redirectToRoute('app_artists');
      }

      $artist->setArtistImg($newFilename);
      $em->persist($artist);
      $em->flush();

      $this->addFlash('notify', 'Artist successfully edited');

      return $this->redirectToRoute('app_artists');
    }

    return $this->renderForm('edit_artist/index.html.twig', [
      'picture' => $artist->getArtistImg(),
      'form' => $form,
    ]);
  }
}
