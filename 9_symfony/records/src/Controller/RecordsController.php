<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecordsController extends AbstractController
{
    #[Route('/records', name: 'app_records')]
    #[IsGranted('ROLE_USER')]
    public function index(RecordRepository $recordRepository): Response
    {
        $records = $recordRepository->fetchAll();
        return $this->render('records/index.html.twig', [
            'controller_name' => 'RecordsController',
            'records' => $records,
        ]);
    }
}
