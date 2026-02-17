<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom de la compétence'),
            
            // Pour la description
            TextField::new('description'), 
            
            // Pour l'icône (ex: "fa-brands fa-php")
            TextField::new('icon', 'Classe CSS Icône'), 
            
            // Menu déroulant pour choisir le SkillSet
            AssociationField::new('SkillSet', 'Catégorie') 
                ->setRequired(true),
        ];
    }
}
