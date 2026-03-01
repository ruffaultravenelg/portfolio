<?php

namespace App\Controller\Admin;

use App\Entity\Production;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

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
                ->setRequired(false),
            TextField::new('title', 'Titre'),
            TextField::new('short_description', 'Description courte'), 
            UrlField::new('url', 'Lien du projet'), 
            TextField::new('tags', 'Tags (séparés par des virgules)'),
            TextEditorField::new('text', 'Description complète'),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets->addHtmlContentToBody('
            <script>
                document.addEventListener("trix-attachment-add", function(event) {
                    if (!event.attachment.file) return;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // On remplace l\'attachement par l\'image encodée en Base64
                        event.attachment.setAttributes({
                            url: e.target.result,
                            href: e.target.result
                        });
                        // On force la barre de progression à 100% pour la faire disparaître
                        event.attachment.setUploadProgress(100);
                    };
                    // On lit le fichier
                    reader.readAsDataURL(event.attachment.file);
                });
            </script>
        ');
    }
}
