<?php

namespace App\Controller\Admin;

use App\Entity\LinkAlias;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class LinkAliasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LinkAlias::class;
    }

    public function createEntity(string $entityFqcn): LinkAlias
    {
        $entity = parent::createEntity($entityFqcn);
        $entity->setVisitCount(0);

        return $entity;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('slug', 'Slug'),
            UrlField::new('url', 'URL cible'),
            IntegerField::new('visitCount', 'Nombre de visites')->hideWhenCreating(),
        ];
    }
    
}
