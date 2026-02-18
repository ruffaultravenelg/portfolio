<?php

namespace App\Controller;

use App\Repository\LinkAliasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LinkAliasController extends AbstractController
{
    #[Route('/link/{slug}', name: 'link')]
    public function link(string $slug, LinkAliasRepository $linkAliasRepository, EntityManagerInterface $em): Response
    {
        $link = $linkAliasRepository->findOneBy(['slug' => $slug]);
        if (!$link) {
            throw $this->createNotFoundException('Lien non trouvé');
        }

        // Update visit count
        $link->setVisitCount($link->getVisitCount() + 1);
        $em->persist($link);
        $em->flush();

        // Redirect
        return $this->redirect($link->getUrl());
    }
}
