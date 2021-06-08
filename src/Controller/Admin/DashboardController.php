<?php

namespace App\Controller\Admin;

use App\Entity\Czytelnik;
use App\Entity\Ksiazki;
use App\Entity\Autorzy;
use App\Entity\Egzemplarze;
use App\Entity\Kategorie;
use App\Entity\Wypozyczenia;
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
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'admin');
        yield MenuItem::linkToCrud('Czytelnicy', 'fas fa-book-reader', Czytelnik::class);
        yield MenuItem::linkToCrud('Książki', 'fas fa-book', Ksiazki::class);
        yield MenuItem::linkToCrud('Autorzy', 'fas fa-address-book', Autorzy::class);
        yield MenuItem::linkToCrud('Egzemplarze', 'fas fa-bookmark', Egzemplarze::class);
        yield MenuItem::linkToCrud('Kategorie', 'fas fa-book-open', Kategorie::class);
        yield MenuItem::linkToCrud('Wypozyczenia', 'fas fa-handshake', Wypozyczenia::class);
    }
}
