<?php

namespace App\Controller\Admin;

use App\Entity\Clubs;
use App\Entity\Races;
use App\Entity\Cities;
use App\Entity\Regions;
use App\Entity\Departements;
use App\Entity\CyclistsCategories;
use App\Controller\Admin\RacesCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        {
            $url = $this->adminUrlGenerator
                ->setController(RacesCrudController::class)
                ->generateUrl();
    
            return $this->redirect($url);
        }
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Easy Cyclisme');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Clubs','fas fa-users');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un club', 'fas fa-plus', Clubs::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des clubs', 'fas fa-eye', Clubs::class)
        ]);
        
        yield MenuItem::section('Compétitions','fas fa-flag-checkered');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une course', 'fas fa-plus', Races::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des courses', 'fas fa-eye', Races::class)
        ]);

        yield MenuItem::section('Catégories','fas fa-biking');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une catégories', 'fas fa-plus', CyclistsCategories::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des catégories', 'fas fa-eye', CyclistsCategories::class)
        ]);

        yield MenuItem::section('Localisation','fas fa-biking');

        yield MenuItem::subMenu('Ligues', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une nouvelle ligue', 'fas fa-plus', Regions::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des ligues', 'fas fa-eye', Regions::class)
        ]);

        yield MenuItem::subMenu('Comités', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer un nouveau comité', 'fas fa-plus', Departements::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des comités', 'fas fa-eye', Departements::class)
        ]);

        yield MenuItem::subMenu('Villes', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une nouvelle ville', 'fas fa-plus', Cities::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des villes', 'fas fa-eye', Cities::class)
        ]);

        
    }
}
