<?php

namespace App\Controller\Admin;

use App\Entity\Brands;
use App\Entity\Cars;
use App\Entity\CarsPage;
use App\Entity\ContactPage;
use App\Entity\FormContact;
use App\Entity\HomePage;
use App\Entity\OpinionPage;
use App\Entity\Garage;
use App\Entity\Fuels;
use App\Entity\Models;
use App\Entity\OpenningGarage;
use App\Entity\Opinions;
use App\Entity\Options;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Types;
use App\Entity\Users;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Page de contact', 'fa-regular fa-file', ContactPage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Page des voitures', 'fa-regular fa-file', CarsPage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Page d\'accueil' , 'fa-regular fa-file', HomePage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Page opinion', 'fa-regular fa-file', OpinionPage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Marque voiture', 'fa-solid fa-car', Brands::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Carburant', 'fa-solid fa-gas-pump', Fuels::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Garage', 'fa-solid fa-warehouse', Garage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Modèle', 'fa-solid fa-car', Models::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Horaires du garage', 'fa-regular fa-clock', OpenningGarage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Avis', 'fa-solid fa-headset', Opinions::class);
        yield MenuItem::linkToCrud('Options', 'fa-solid fa-gear', Options::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Types', 'fa-solid fa-gear', Types::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linktocrud('Employés', 'fa-solid fa-person', Users::class)
            ->setPermission('ROLE_ADMIN');
        yield menuitem::linkToCrud('Formulaire de contact', 'fa-solid fa-headset', FormContact::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Voitures','fa-solid fa-car', Cars::class);
        yield MenuItem::linkToRoute('retour au site', 'fas fa-home', 'app_home_page_index');
        yield MenuItem::linkToLogout('Se déconnecter', 'fa fa_exit');
    }
}