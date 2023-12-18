<?php

namespace App\Controller;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(NoteRepository $noterepository): Response
    {
        return $this->render('home/index.html.twig', [
            'notes' => $noterepository->findAll(),
        ]);
    }
    
    #[Route('/home/{id}', name: 'app_note_show', methods: ['GET'])]
    public function show(Note $note): Response
    {
     
        return $this->render('home/show.html.twig', [
            'note' => $note,
        ]);
    }
}
