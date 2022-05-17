<?php

namespace App\Controller;

use App\Repository\RecordRepository;
use App\Repository\ArtistRepository;
use App\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditRecordController extends AbstractController
{
  #[Route('/record/{id}/edit', name: 'app_edit_record')]
  public function index(Request $request, int $id, RecordRepository $recordRepository, ManagerRegistry $doctrine): Response
  {
    $record = $recordRepository->find($id);

    if ($record) {
      $form = $this->createFormBuilder($record)
        ->add('record_title', TextType::class)
        ->add('artist_id', EntityType::class, [
          'class' => Artist::class,
          'query_builder' => function (ArtistRepository $ar) {
            return $ar->createQueryBuilder('a')
              ->orderBy('a.artist_name', 'ASC');
          },
          'choice_label' => 'artist_name',
        ])
        ->add('record_year', NumberType::class)
        ->add('record_label', TextType::class)
        ->add('record_genre', TextType::class) 
        ->add('record_price', NumberType::class)
        ->add('record_picture', FileType::class, [
          'mapped' => false,
          'required' => false,
          'constraints' => [
            new File([
              'mimeTypes' => [
                'image/gif',
                'image/jpeg',
                'image/jpg',
                'image/png',
              ],
              'mimeTypesMessage' => 'Please upload a valid image file',
            ])
          ]
        ])
        ->add('Save', SubmitType::class)
        ->add('Cancel', ResetType::class)
        ->getForm();

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $record = $form->getData();
        $picture = $form->get('record_picture')->getData();
        if ($picture) {
          $filename = strtolower($form->get('record_title')->getData());
          $newFilename = str_replace(' ', '-', $filename).'-'.$record->getArtistId().'.'.$picture->guessExtension();
        }
      }

      return $this->renderForm('edit_record/index.html.twig', [
        'form' => $form,
      ]);
    } else {
      $this->addFlash('notify-error', 'Invalid album id ('.$id.')');
      return $this->redirectToRoute('app_records');
    }
  }
}
