<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProgramRepository;


#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        return $this->render('program/index.html.twig', [
            'programs' => $programRepository->findAll(),
         ]);
    }

    #[Route('/{id}/', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show( ProgramRepository $programRepository, int $id = 1,): Response
    {        
        
        // same as $program = $programRepository->find($id);
    
        return $this->render('program/show.html.twig', [
            'program' =>$programRepository->findOneBy(['id' => $id])
        ]);
    }
}
