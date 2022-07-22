<?php

namespace App\Controller;

use App\Entity\Moment;
use App\Repository\MomentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(MomentRepository $momentRepository): Response
    {
        $moments = $momentRepository->findAll();

        return $this->render('home/index.html.twig', [
            'message' => 'Bienvenue sur Mon Moment Foot #MMF',
            'moments' => $moments,
        ]);
    }
}
