<?php

namespace App\Controller;

use App\Entity\Jambes;
use App\Form\JambesType;
use App\Repository\JambesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/jambes')]
class JambesController extends AbstractController
{
    #[Route('/', name: 'app_jambes_index', methods: ['GET'])]
    public function index(JambesRepository $jambesRepository): Response
    {
        return $this->render('jambes/index.html.twig', [
            'jambes' => $jambesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_jambes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, JambesRepository $jambesRepository): Response
    {
        $jambe = new Jambes();
        $form = $this->createForm(JambesType::class, $jambe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jambesRepository->save($jambe, true);

            return $this->redirectToRoute('app_jambes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('jambes/new.html.twig', [
            'jambe' => $jambe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jambes_show', methods: ['GET'])]
    public function show(Jambes $jambe): Response
    {
        return $this->render('jambes/show.html.twig', [
            'jambe' => $jambe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jambes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Jambes $jambe, JambesRepository $jambesRepository): Response
    {
        $form = $this->createForm(JambesType::class, $jambe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jambesRepository->save($jambe, true);

            return $this->redirectToRoute('app_jambes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('jambes/edit.html.twig', [
            'jambe' => $jambe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jambes_delete', methods: ['POST'])]
    public function delete(Request $request, Jambes $jambe, JambesRepository $jambesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jambe->getId(), $request->request->get('_token'))) {
            $jambesRepository->remove($jambe, true);
        }

        return $this->redirectToRoute('app_jambes_index', [], Response::HTTP_SEE_OTHER);
    }
}
