<?php

namespace App\Controller;

use App\Repository\SongRepository;
use App\Entity\Record;
use App\Form\SongType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditSongsController extends AbstractController
{
  #[Route('/record/{id}/edit/songs', name: 'app_edit_songs')]
  public function index(int $id, Record $em): Response
  {

    $songs = $em->getSongs();

    if ($songs) {

      $form = $this->createForm(SongType::class, $songs);

      return $this->renderForm('edit_songs/index.html.twig', [
        'form' => $form,
      ]);  
    }

    $this->addFlash('notify-error', 'Could not find an album with id: '.$id);
    return $this->redirectToRoute('app_records');
  }
}
