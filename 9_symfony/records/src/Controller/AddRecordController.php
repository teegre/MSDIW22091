<?php

namespace App\Controller;
use App\Entity\Record;
use App\Form\RecordType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class AddRecordController extends AbstractController
{
    #[Route('/add/record', name: 'app_add_record')]
    public function index(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $record = new Record();

        $form = $this->createForm(RecordType::class, $record);

        $form->handleRequest($request);

        $record = $form->getData();

        if ($form->isSubmitted() && $form->isValid()) {

          $picture = $form->get('record_picture')->getData();

          if ($picture) {
            $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$picture->guessExtension();
          }

          try {
            $picture->move(
              $this->getParameter('pictures_directory'),
              $newFilename
            );
          } catch (FileException $e) {
            $this->addFlash('notify-error', $e->getMessage());
            die();
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
