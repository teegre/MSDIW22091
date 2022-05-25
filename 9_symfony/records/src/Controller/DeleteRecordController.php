<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteRecordController extends AbstractController
{
    #[Route('/record/{id}/delete', name: 'app_delete_record', methods: ['GET', 'HEAD'])]
    #[IsGranted('ROLE_USER')]
    public function index(int $id, RecordRepository $recordRepository): RedirectResponse
    {
        $record = $recordRepository->find($id);
        if ($record) {
          $recordRepository->remove($record, true);
          $this->addFlash('notify', 'Record successfully deleted');
        } else {
          $this->addFlash('notify-error', 'Could not find record with id: '.$id);
        }

        return $this->redirectToRoute('app_records');
    }
}
