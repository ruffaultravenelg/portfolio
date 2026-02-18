<?php

namespace App\Controller\Admin;

use App\Entity\Hobby;
use App\Entity\LinkAlias;
use App\Entity\Production;
use App\Entity\Skill;
use App\Entity\SkillSet;
use App\Entity\Timeline;
use App\Entity\TimelineItem;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(SkillSetCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        // php bin/console make:admin:crud
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Catégorie de compétences', 'fas fa-layer-group', SkillSet::class);
        yield MenuItem::linkToCrud('Compétences', 'fas fa-code', Skill::class);
        yield MenuItem::linkToCrud('Timelines', 'fa-solid fa-timeline', Timeline::class);
        yield MenuItem::linkToCrud('Timeline item', 'fa-regular fa-calendar', TimelineItem::class);
        yield MenuItem::linkToCrud('Realisations', 'fa-solid fa-book', Production::class);
        yield MenuItem::linkToCrud('Hobbies', 'fa-solid fa-masks-theater', Hobby::class);
        yield MenuItem::linkToCrud('Link alias', 'fa-solid fa-link', LinkAlias::class);
    }
}
