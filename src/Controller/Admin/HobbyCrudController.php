<?php

namespace App\Controller\Admin;

use App\Entity\Hobby;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HobbyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hobby::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/hobbies')
                ->setUploadDir('public/uploads/hobbies')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
            TextField::new('title', 'Titre'),
            TextEditorField::new('text', 'Texte'), 
        ];
    }
    
}
