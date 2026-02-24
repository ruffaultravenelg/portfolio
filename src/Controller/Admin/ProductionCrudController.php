<?php

namespace App\Controller\Admin;

use App\Entity\Production;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ProductionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Production::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/productions')
                ->setUploadDir('public/uploads/productions')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
            TextField::new('title', 'Titre'),
            TextField::new('short_description', 'Description courte'), 
            UrlField::new('url', 'Lien du projet'), 
            TextField::new('tags', 'Tags (séparés par des virgules)'),
            TextEditorField::new('text', 'Description complète'), 
        ];
    }
}
