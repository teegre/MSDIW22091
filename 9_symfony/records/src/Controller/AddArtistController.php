<?php

namespace App\Controller;

use App\Entity\Artist;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\File;

class AddArtistController extends AbstractController
{
    #[Route('/add/artist', name: 'app_add_artist')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
      $artist = new Artist();

      $form = $this->createFormBuilder($artist)
        ->add('artist_name', TextType::class, [ 'label' => 'Name' ])
        ->add('artist_img', FileType::class, [
          'mapped' => false,
          'required' => true,
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
        ->add('submit', SubmitType::class, ['label' => 'Add'])
        ->getForm();

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $artist = $form->getData();
        $picture = $form->get('artist_img')->getData();
        if ($picture) {
          $newFilename = strtolower($form->get('artist_name')->getData()).$picture->guessExtension();
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

        $artist->setArtistImg($newFilename);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($artist);
        $entityManager->flush();

        $this->addFlash('notify', 'New artist added');

        return $this->redirectToRoute('app_artists');
      }
      
      return $this->renderForm('add_artist/index.html.twig', [
            'form' => $form,
      ]);
    }
}
