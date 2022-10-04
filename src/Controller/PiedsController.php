<?php

namespace App\Controller;

use App\Entity\Pieds;
use App\Form\PiedsType;
use App\Repository\PiedsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pieds')]
class PiedsController extends AbstractController
{
    #[Route('/', name: 'app_pieds_index', methods: ['GET'])]
    public function index(PiedsRepository $piedsRepository): Response
    {
        return $this->render('pieds/index.html.twig', [
            'pieds' => $piedsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pieds_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PiedsRepository $piedsRepository): Response
    {
        $pied = new Pieds();
        $form = $this->createForm(PiedsType::class, $pied);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $piedsRepository->save($pied, true);

            return $this->redirectToRoute('app_pieds_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pieds/new.html.twig', [
            'pied' => $pied,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pieds_show', methods: ['GET'])]
    public function show(Pieds $pied): Response
    {
        return $this->render('pieds/show.html.twig', [
            'pied' => $pied,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pieds_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pieds $pied, PiedsRepository $piedsRepository): Response
    {
        $form = $this->createForm(PiedsType::class, $pied);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $piedsRepository->save($pied, true);

            return $this->redirectToRoute('app_pieds_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pieds/edit.html.twig', [
            'pied' => $pied,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pieds_delete', methods: ['POST'])]
    public function delete(Request $request, Pieds $pied, PiedsRepository $piedsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pied->getId(), $request->request->get('_token'))) {
            $piedsRepository->remove($pied, true);
        }

        return $this->redirectToRoute('app_pieds_index', [], Response::HTTP_SEE_OTHER);
    }
}
