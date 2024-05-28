<?php

namespace App\Controller;

use HCGCloud\Pterodactyl\Pterodactyl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dash(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }
    #[Route('/play', name: 'app_dashboard')]
    public function play(): Response
    {
        $ptero = new Pterodactyl('ptla_CRr5GhnRAGXrbKU77eSasI0IuM74QBfYkYp3d6moso9','https://cp.planetdevelopment.de');

        $servers = $ptero->servers();

        return $this->render('home/play.html.twig', [
            'servers' => $servers['data']
        ]);
    }
}