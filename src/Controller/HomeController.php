<?php

namespace App\Controller;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function list(NoteRepository $noterepository): Response
    {
        return $this->render('notes/index.html.twig', [
            'notes' => $noterepository->findBy([],['id' => 'desc'],5),
        ]);
    }

    #[Route('/search/{slug}', name: 'search')]
    public function searchtitle(NoteRepository $noterepository,$slug): Response
    {
        return $this->render('notes/index.html.twig', [
            'notes' => $noterepository->findByTitle($slug),
        ]);
    }

    #[Route('/notes', name: 'notes')]
    public function index(NoteRepository $noterepository): Response
    {
        return $this->render('notes/index.html.twig', [
            'notes' => $noterepository->findAll(),
        ]);
    }
    
    #[Route('/note/{id}', name: 'note', methods: ['GET'])]
    public function show(Note $note): Response
    {
     
        return $this->render('notes/show.html.twig', [
            'note' => $note,
        ]);
    }
}
