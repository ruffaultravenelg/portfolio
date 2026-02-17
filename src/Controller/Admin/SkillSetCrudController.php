<?php

namespace App\Controller\Admin;

use App\Entity\SkillSet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SkillSetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SkillSet::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom de la catégorie'),
            
            CollectionField::new('skills', 'Compétences associées')
                ->useEntryCrudForm() // Utilise le formulaire de SkillCrudController
                ->renderExpanded() // Affiche la liste ouverte
        ];
    }
    
}
