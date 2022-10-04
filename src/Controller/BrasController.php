<?php

namespace App\Controller;

use App\Entity\Bras;
use App\Form\BrasType;
use App\Repository\BrasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bras')]
class BrasController extends AbstractController
{
    #[Route('/', name: 'app_bras_index', methods: ['GET'])]
    public function index(BrasRepository $brasRepository): Response
    {
        return $this->render('bras/index.html.twig', [
            'bras' => $brasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bras_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BrasRepository $brasRepository): Response
    {
        $bra = new Bras();
        $form = $this->createForm(BrasType::class, $bra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brasRepository->save($bra, true);

            return $this->redirectToRoute('app_bras_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bras/new.html.twig', [
            'bra' => $bra,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bras_show', methods: ['GET'])]
    public function show(Bras $bra): Response
    {
        return $this->render('bras/show.html.twig', [
            'bra' => $bra,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bras_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bras $bra, BrasRepository $brasRepository): Response
    {
        $form = $this->createForm(BrasType::class, $bra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brasRepository->save($bra, true);

            return $this->redirectToRoute('app_bras_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bras/edit.html.twig', [
            'bra' => $bra,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bras_delete', methods: ['POST'])]
    public function delete(Request $request, Bras $bra, BrasRepository $brasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bra->getId(), $request->request->get('_token'))) {
            $brasRepository->remove($bra, true);
        }

        return $this->redirectToRoute('app_bras_index', [], Response::HTTP_SEE_OTHER);
    }
}
