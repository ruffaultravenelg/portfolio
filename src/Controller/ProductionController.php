<?php

namespace App\Controller;

use App\Entity\Production;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductionController extends AbstractController
{
    #[Route('/realisation/{id}', name: 'production')]
    public function index(Production $production): Response
    {
        return $this->render('production/index.html.twig', [
            'production' => $production,
        ]);
    }
}
