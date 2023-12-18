<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Note;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Notes App');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Notes', 'fa fa-home');
        
        yield MenuItem::section('Notes');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems(
            [
                MenuItem::linkToCrud('Voir Notes', 'fas fa-list', Note::class),
                MenuItem::linkToCrud('Ajout Note', 'fas fa-list', Note::class)->setAction(Crud::PAGE_NEW),
            ]
        );

        yield MenuItem::section('Category');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems(
            [
                MenuItem::linkToCrud('Voir Categorie', 'fas fa-list', Category::class),
                MenuItem::linkToCrud('Ajout Categorie', 'fas fa-list', Category::class)->setAction(Crud::PAGE_NEW),
            ]
        );
    }
}
