<?php

namespace App\Controller\Admin;

use App\Entity\Czytelnik;
use App\Entity\Ksiazki;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AmberLibrary');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Czytelnicy', 'fas fa-map-marker-alt', Czytelnik::class);
        yield MenuItem::linkToCrud('Książki', 'fas fa-comments', Ksiazki::class);
    }
}
