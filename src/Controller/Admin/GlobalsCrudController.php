<?php

namespace App\Controller\Admin;

use App\Entity\Globals;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\File;

class GlobalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Globals::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email', 'Adresse e-mail'),
            TextField::new('phone', 'Numéro de téléphone'),
            TextField::new('bannerTitle', 'Titre de la bannière'),
            TextEditorField::new('bannerDescription', 'Description de la bannière'),
            ImageField::new('cv_url', 'Fichier CV (PDF)')
                ->setBasePath('uploads/cv')
                ->setUploadDir('public/uploads/cv')
                ->setUploadedFileNamePattern('[name].[extension]')
                ->setRequired(false)
                ->setFileConstraints(new File([
                    'maxSize' => '5M',
                    'mimeTypes' => ['application/pdf', 'application/x-pdf'],
                    'mimeTypesMessage' => 'Veuillez uploader un document PDF valide',
                ])),
        ];
    }
    
}
