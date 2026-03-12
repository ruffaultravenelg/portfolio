<?php

namespace App\Controller\Admin;

use App\Entity\TimelineItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TimelineItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimelineItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextField::new('date', 'Date')->setHelp('ex: "2025 - 2026"'), 
            TextEditorField::new('description', 'Description'), 
            AssociationField::new('timeline', 'Timeline associé') 
                ->setRequired(true),
            IntegerField::new('position', 'Ordre d\'affichage')->setHelp("Plus grand = plus haut")->setRequired(false),
        ];
    }
}
