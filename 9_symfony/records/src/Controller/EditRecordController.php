<?php

namespace App\Controller;

use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditRecordController extends AbstractController
{
  #[Route('/record/{id}/edit', name: 'app_edit_record')]
  public function index(int $id, RecordRepository $recordRepository): Response
  {
    $record = $recordRepository->find($id);

    if ($record) {
      $form = $this->createFormBuilder($record)
        ->add('record_title', TextType::class, [ 'label' => 'Title',
          'attr' => [
            'value' => $record->getRecordTitle(),
          ]
        ])
        ->getForm();

      return $this->renderForm('edit_record/index.html.twig', [
        'form' => $form,
      ]);
    } else {
      $this->addFlash('notify-error', 'Invalid album id ('.$id.')');
      return $this->redirectToRoute('app_records');
    }
  }
}
