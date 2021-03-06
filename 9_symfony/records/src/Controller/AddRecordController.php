<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Record;
use App\Form\RecordType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddRecordController extends AbstractController
{
    #[Route('/add/record', name: 'app_add_record')]
    #[IsGranted('ROLE_USER')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $record = new Record();

        $form = $this->createForm(RecordType::class, $record);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $record = $form->getData();
          $picture = $form->get('record_picture')->getData();

          if ($picture) {
            $filename = strtolower($form->get('record_title')->getData());
            $newFilename = str_replace(' ', '_', $filename).'-'.$form->get('artist_id')->getData()->getArtistId().'.'.$picture->guessExtension();
          }

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

          $entityManager = $doctrine->getManager();

          $entityManager->persist($record);
          $entityManager->flush();

          $this->addFlash('notify', 'New record added.');

          return $this->redirectToRoute('app_records');
        }

        return $this->renderForm('add_record/index.html.twig', [
            'form' => $form,
        ]);

    }
}
