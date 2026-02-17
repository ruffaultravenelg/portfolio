<?php

namespace App\Controller;

use App\Repository\SkillSetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(SkillSetRepository $skillSetRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'skillSets' => $skillSetRepository->findAll(),
        ]);
    }
}
