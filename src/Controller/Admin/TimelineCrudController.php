<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TimelineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Timeline::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom de la timeline'),
        ];
    }
}
