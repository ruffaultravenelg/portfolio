<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ExperienceController extends AbstractController
{
    #[Route('/experience/{name}', name: 'experience')]
    public function show(string $name, KernelInterface $kernel): Response
    {
        // Get index filepath
        $path = $kernel->getProjectDir() . '/public/misc/' . $name . '/index.html';
        if (!file_exists($path)) {
            throw $this->createNotFoundException('Cette expérience n\'existe pas.');
        }

        // Reads html
        $html = file_get_contents($path);

        // Add <base> tag to ensure relative paths works
        $baseTag = sprintf('<base href="/misc/%s/">', $name);
        $html = str_ireplace('<head>', '<head>' . "\n    " . $baseTag, $html);

        // Returns html response
        return new Response($html);
    }
}
