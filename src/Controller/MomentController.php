<?php

namespace App\Controller;

use App\Entity\Moment;
use App\Form\MomentType;
use App\Repository\MomentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/moment')]
class MomentController extends AbstractController
{
    #[Route('/', name: 'app_moment_index', methods: ['GET'])]
    public function index(MomentRepository $momentRepository): Response
    {
        return $this->render('moment/index.html.twig', [
            'moments' => $momentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_moment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MomentRepository $momentRepository): Response
    {
        $moment = new Moment();
        $form = $this->createForm(MomentType::class, $moment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $momentRepository->add($moment, true);

            return $this->redirectToRoute('app_moment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('moment/new.html.twig', [
            'moment' => $moment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_moment_show', methods: ['GET'])]
    public function show(Moment $moment): Response
    {
        return $this->render('moment/show.html.twig', [
            'moment' => $moment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_moment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Moment $moment, MomentRepository $momentRepository): Response
    {
        $form = $this->createForm(MomentType::class, $moment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $momentRepository->add($moment, true);

            return $this->redirectToRoute('app_moment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('moment/edit.html.twig', [
            'moment' => $moment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_moment_delete', methods: ['POST'])]
    public function delete(Request $request, Moment $moment, MomentRepository $momentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moment->getId(), $request->request->get('_token'))) {
            $momentRepository->remove($moment, true);
        }

        return $this->redirectToRoute('app_moment_index', [], Response::HTTP_SEE_OTHER);
    }
}
