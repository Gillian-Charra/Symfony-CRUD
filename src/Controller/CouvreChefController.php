<?php

namespace App\Controller;

use App\Entity\CouvreChef;
use App\Form\CouvreChefType;
use App\Repository\CouvreChefRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/couvre-chef')]
class CouvreChefController extends AbstractController
{
    #[Route('/', name: 'app_couvre_chef_index', methods: ['GET'])]
    public function index(CouvreChefRepository $couvreChefRepository): Response
    {
        return $this->render('couvre_chef/index.html.twig', [
            'couvre_chefs' => $couvreChefRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_couvre_chef_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CouvreChefRepository $couvreChefRepository): Response
    {
        $couvreChef = new CouvreChef();
        $form = $this->createForm(CouvreChefType::class, $couvreChef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $couvreChefRepository->save($couvreChef, true);

            return $this->redirectToRoute('app_couvre_chef_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('couvre_chef/new.html.twig', [
            'couvre_chef' => $couvreChef,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_couvre_chef_show', methods: ['GET'])]
    public function show(CouvreChef $couvreChef): Response
    {
        return $this->render('couvre_chef/show.html.twig', [
            'couvre_chef' => $couvreChef,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_couvre_chef_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CouvreChef $couvreChef, CouvreChefRepository $couvreChefRepository): Response
    {
        $form = $this->createForm(CouvreChefType::class, $couvreChef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $couvreChefRepository->save($couvreChef, true);

            return $this->redirectToRoute('app_couvre_chef_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('couvre_chef/edit.html.twig', [
            'couvre_chef' => $couvreChef,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_couvre_chef_delete', methods: ['POST'])]
    public function delete(Request $request, CouvreChef $couvreChef, CouvreChefRepository $couvreChefRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$couvreChef->getId(), $request->request->get('_token'))) {
            $couvreChefRepository->remove($couvreChef, true);
        }

        return $this->redirectToRoute('app_couvre_chef_index', [], Response::HTTP_SEE_OTHER);
    }
}
