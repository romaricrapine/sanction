<?php

namespace App\Controller\Admin\Dashboard;

use App\Entity\ReasonSanction;
use App\Entity\SanctionPlayer;
use App\Entity\TimeSanction;
use App\Entity\TypeSanction;
use App\Entity\User;
use App\Entity\WarnPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="app_admin_dashboard")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard Sanction/Warn');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');

        yield MenuItem::section('Modération');
        yield MenuItem::linkToCrud('Warn', 'fas fa-list', WarnPlayer::class);
        yield MenuItem::linkToCrud('Sanction', 'fas fa-list', SanctionPlayer::class);

        yield MenuItem::section('Administration Utilisateur')->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Staff', 'fas fa-list', User::class)->setPermission('ROLE_ADMIN');

        yield MenuItem::section('Configuration des Sanctions/Warns')->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Liste des Raisons', 'fas fa-list', ReasonSanction::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Liste des Durée', 'fas fa-list', TimeSanction::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Type de Sanction', 'fas fa-list', TypeSanction::class)->setPermission('ROLE_ADMIN');
    }

}
