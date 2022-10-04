<?php

namespace App\Controller;

use App\Entity\Torse;
use App\Form\TorseType;
use App\Repository\TorseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/torse')]
class TorseController extends AbstractController
{
    #[Route('/', name: 'app_torse_index', methods: ['GET'])]
    public function index(TorseRepository $torseRepository): Response
    {
        return $this->render('torse/index.html.twig', [
            'torses' => $torseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_torse_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TorseRepository $torseRepository): Response
    {
        $torse = new Torse();
        $form = $this->createForm(TorseType::class, $torse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $torseRepository->save($torse, true);

            return $this->redirectToRoute('app_torse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('torse/new.html.twig', [
            'torse' => $torse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_torse_show', methods: ['GET'])]
    public function show(Torse $torse): Response
    {
        return $this->render('torse/show.html.twig', [
            'torse' => $torse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_torse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Torse $torse, TorseRepository $torseRepository): Response
    {
        $form = $this->createForm(TorseType::class, $torse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $torseRepository->save($torse, true);

            return $this->redirectToRoute('app_torse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('torse/edit.html.twig', [
            'torse' => $torse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_torse_delete', methods: ['POST'])]
    public function delete(Request $request, Torse $torse, TorseRepository $torseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$torse->getId(), $request->request->get('_token'))) {
            $torseRepository->remove($torse, true);
        }

        return $this->redirectToRoute('app_torse_index', [], Response::HTTP_SEE_OTHER);
    }
}
