<?php

namespace App\Controller;

use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecordController extends AbstractController
{
  #[Route('/record/{id}', name: 'app_record', methods: ['GET', 'HEAD'])]
  public function index(int $id, RecordRepository $recordRepository): Response
  {
    $record = $recordRepository->find($id);

    if ($record) {
      return $this->render('record/index.html.twig', [
        'record' => $record,
      ]);
    } else {
      $this->addFlash('notify-error', 'Could not find a record with id: '.$id);
      return $this->redirectToRoute('app_records');
    }
  }
}
