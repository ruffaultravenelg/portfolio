<?php

namespace App\Twig;

use App\Repository\GlobalsRepository;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    private $globalsRepository;

    public function __construct(GlobalsRepository $globalsRepository)
    {
        $this->globalsRepository = $globalsRepository;
    }

    public function getGlobals(): array
    {
        $global = $this->globalsRepository->findOneBy([]);

        return [
            'global' => $global,
        ];
    }
}