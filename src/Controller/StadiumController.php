<?php

namespace App\Controller;

use App\Entity\Stadium;
use App\Form\StadiumType;
use App\Repository\StadiumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stadium')]
class StadiumController extends AbstractController
{
    #[Route('/', name: 'app_stadium_index', methods: ['GET'])]
    public function index(StadiumRepository $stadiumRepository): Response
    {
        return $this->render('stadium/index.html.twig', [
            'stadiums' => $stadiumRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stadium_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StadiumRepository $stadiumRepository): Response
    {
        $stadium = new Stadium();
        $form = $this->createForm(StadiumType::class, $stadium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stadiumRepository->add($stadium, true);

            return $this->redirectToRoute('app_stadium_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stadium/new.html.twig', [
            'stadium' => $stadium,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stadium_show', methods: ['GET'])]
    public function show(Stadium $stadium): Response
    {
        return $this->render('stadium/show.html.twig', [
            'stadium' => $stadium,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stadium_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stadium $stadium, StadiumRepository $stadiumRepository): Response
    {
        $form = $this->createForm(StadiumType::class, $stadium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stadiumRepository->add($stadium, true);

            return $this->redirectToRoute('app_stadium_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stadium/edit.html.twig', [
            'stadium' => $stadium,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stadium_delete', methods: ['POST'])]
    public function delete(Request $request, Stadium $stadium, StadiumRepository $stadiumRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stadium->getId(), $request->request->get('_token'))) {
            $stadiumRepository->remove($stadium, true);
        }

        return $this->redirectToRoute('app_stadium_index', [], Response::HTTP_SEE_OTHER);
    }
}
