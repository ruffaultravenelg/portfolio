<?php

namespace App\Controller;

use App\Repository\HobbyRepository;
use App\Repository\ProductionRepository;
use App\Repository\SkillSetRepository;
use App\Repository\TimelineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(SkillSetRepository $skillSetRepository, TimelineRepository $timelineRepository, ProductionRepository $productionRepository, HobbyRepository $hobbyRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'skillSets' => $skillSetRepository->findAll(),
            'timelines' => $timelineRepository->findAll(),
            'productions' => $productionRepository->findAll(),
            'hobbies' => $hobbyRepository->findAll(),
        ]);
    }
}
