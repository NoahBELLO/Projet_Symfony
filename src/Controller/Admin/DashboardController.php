<?php

namespace App\Controller\Admin;

use App\Entity\Compagny;
use App\Entity\Job;
use App\Entity\JobApplication;
use App\Entity\JobCategorie;
use App\Entity\JobType;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Compagny', 'fas fa-list', Compagny::class);
        yield MenuItem::linkToCrud('Job', 'fas fa-list', Job::class);
        yield MenuItem::linkToCrud('JobCategory', 'fas fa-list', JobCategorie::class);
        yield MenuItem::linkToCrud('JobType', 'fas fa-list', JobType::class);
        yield MenuItem::linkToCrud('JobApplication', 'fas fa-list', JobApplication::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
    }
}
