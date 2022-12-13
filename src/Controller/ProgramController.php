<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProgramRepository;


class ProgramController extends AbstractController
{

    #[Route('/program', name: 'program_index')]
    public function index(ProgramRepository $programRepository): Response
    {
        return $this->render('program/index.html.twig', [
            'programs' => $programRepository->findAll(),
        ]);
    }

    #[Route('/{id}/', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(ProgramRepository $programRepository, int $id = 1): Response
    {

        return $this->render('program/show.html.twig', [
            'program' => $programRepository->findOneBy(['id' => $id])
        ]);
    }
}
