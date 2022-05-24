<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Entity\Record;
use App\Entity\Artist;
use App\Form\SongType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditRecordController extends AbstractController
{
  #[Route('/record/{id}/edit', name: 'app_edit_record')]
  public function index(Request $request, int $id, EntityManagerInterface $em): Response
  {
    $record = $em->find(Record::class, $id);

    if ($record) {
      $form = $this->createFormBuilder($record)
        ->add('songs', CollectionType::class, [
          'entry_type' => SongType::class,
          'entry_options' => ['label' => false ],
          'allow_add' => true,
          'allow_delete' => true,
          'prototype' => true,
          'label' => false,
        ])
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
                'image/webp',
              ],
              'mimeTypesMessage' => 'Please upload a valid image file',
            ])
          ]
        ])
        ->add('submit', SubmitType::class, ['label' => 'Save'])
        ->add('cancel', ResetType::class)
        ->getForm();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $record = $form->getData();
        $picture = $form->get('record_picture')->getData();
        if ($picture) {
          $filename = strtolower($form->get('record_title')->getData());
          $newFilename = str_replace(' ', '_', $filename).'-'.$record->getArtistId()->getArtistId().'.'.$picture->guessExtension();

          try {
            $picture->move(
              $this->getParameter('pictures_directory'),
              $newFilename
            );
          } catch (FileException $e) {
            $this->addFlash('notify-error', $e->getMessage());
            return $this->redirectToRoute('app_records');
          }

          $record->setRecordPicture($newFilename);
        }

        $songs = $form->get('songs')->getData();
        $count = 0;
        foreach ($songs as $song) {
          $count++;
          if (!($song->getRecordId())) {
            $song->setRecordId($record);
            $song->setSongId($count);
            $em->persist($song);
          }
        }

        $em->flush();
        $this->addFlash('notify', 'Record updated successfully');
        return $this->redirectToRoute('app_records');

      } else if ($form->isSubmitted() && !$form->isValid()) {
        $this->addFlash('notify-error', 'Oops... Something went wrong...');
        return $this->redirectToRoute('app_records');
      }

      return $this->renderForm('edit_record/index.html.twig', [
        'form' => $form,
        'record' => $record,
        'picture' => $record->getRecordPicture(),
      ]);
    } else {
      $this->addFlash('notify-error', 'Invalid album id ('.$id.')');
      return $this->redirectToRoute('app_records');
    }
  }
}
