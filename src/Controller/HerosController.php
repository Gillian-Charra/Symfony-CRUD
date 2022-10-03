<?php

namespace App\Controller;

use App\Entity\Heros;
use App\Form\HerosType;
use App\Repository\HerosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/heros')]
class HerosController extends AbstractController
{
    #[Route('/', name: 'app_heros_index', methods: ['GET'])]
    public function index(HerosRepository $herosRepository): Response
    {
        return $this->render('heros/index.html.twig', [
            'heros' => $herosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_heros_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HerosRepository $herosRepository): Response
    {
        $hero = new Heros();
        $form = $this->createForm(HerosType::class, $hero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hero->setATT($hero->getNiveau()*0.25*$hero->getClasse()->getBaseATT()+3*$hero->getClasse()->getBaseATT());
            $hero->setDEF($hero->getNiveau()*0.2*$hero->getClasse()->getBaseDEF()+3*$hero->getClasse()->getBaseDEF());
            $hero->setPV($hero->getNiveau()*0.3*$hero->getClasse()->getBasePV()+3*$hero->getClasse()->getBasePV());
            $hero->setVIT($hero->getNiveau()*0.1*$hero->getClasse()->getBaseVIT()+3*$hero->getClasse()->getBaseVIT());
            $AttApresEquip=$hero->getATT();
            $DefApresEquip=$hero->getDEF();
            $PvApresEquip=$hero->getPV();
            $VitApresEquip=$hero->getVIT();
            if(null!==$hero->getArmes()){
                $AttApresEquip=$AttApresEquip+$hero->getArmes()->getFlatATT()+($hero->getArmes()->getmultATT()/100)*$hero->getATT();
            }
            if(null!==$hero->getCouvreChef()){
                $AttApresEquip=$AttApresEquip+$hero->getCouvreChef()->getFlatATT()+$hero->getCouvreChef()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getTorse()){
                $AttApresEquip=$AttApresEquip+$hero->getTorse()->getFlatATT()+$hero->getTorse()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getBras()){
                $AttApresEquip=$AttApresEquip+$hero->getBras()->getFlatATT()+$hero->getBras()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getJambes()){
                $AttApresEquip=$AttApresEquip+$hero->getJambes()->getFlatATT()+$hero->getJambes()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getPieds()){
                $AttApresEquip=$AttApresEquip+$hero->getPieds()->getFlatATT()+$hero->getPieds()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getMonture()){
                $AttApresEquip=$AttApresEquip+$hero->getMonture()->getFlatATT()+$hero->getMonture()->getmultATT()/100*$hero->getATT();
            }
            $hero->setATTAvecEquipement( $AttApresEquip);
            $hero->setDEFAvecEquipement($DefApresEquip);
            $hero->setPVAvecEquipement( $PvApresEquip);
            $hero->setVITAvecEquipement( $VitApresEquip);
            $herosRepository->save($hero, true);
            return $this->redirectToRoute('app_heros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('heros/new.html.twig', [
            'hero' => $hero,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_heros_show', methods: ['GET'])]
    public function show(Heros $hero): Response
    {
        return $this->render('heros/show.html.twig', [
            'hero' => $hero,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_heros_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Heros $hero, HerosRepository $herosRepository): Response
    {
        $form = $this->createForm(HerosType::class, $hero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hero->setATT($hero->getNiveau()*0.25*$hero->getClasse()->getBaseATT()+3*$hero->getClasse()->getBaseATT());
            $hero->setDEF($hero->getNiveau()*0.2*$hero->getClasse()->getBaseDEF()+3*$hero->getClasse()->getBaseDEF());
            $hero->setPV($hero->getNiveau()*0.3*$hero->getClasse()->getBasePV()+3*$hero->getClasse()->getBasePV());
            $hero->setVIT($hero->getNiveau()*0.1*$hero->getClasse()->getBaseVIT()+3*$hero->getClasse()->getBaseVIT());
            $AttApresEquip=$hero->getATT();
            $DefApresEquip=$hero->getDEF();
            $PvApresEquip=$hero->getPV();
            $VitApresEquip=$hero->getVIT();
            if(null!==$hero->getArmes()){
                $AttApresEquip=$AttApresEquip+$hero->getArmes()->getFlatATT()+($hero->getArmes()->getmultATT()/100)*$hero->getATT();
            }
            if(null!==$hero->getCouvreChef()){
                $AttApresEquip=$AttApresEquip+$hero->getCouvreChef()->getFlatATT()+($hero->getCouvreChef()->getmultATT()/100)*$hero->getATT();
            }
            if(null!==$hero->getTorse()){
                $AttApresEquip=$AttApresEquip+$hero->getTorse()->getFlatATT()+$hero->getTorse()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getBras()){
                $AttApresEquip=$AttApresEquip+$hero->getBras()->getFlatATT()+$hero->getBras()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getJambes()){
                $AttApresEquip=$AttApresEquip+$hero->getJambes()->getFlatATT()+$hero->getJambes()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getPieds()){
                $AttApresEquip=$AttApresEquip+$hero->getPieds()->getFlatATT()+$hero->getPieds()->getmultATT()/100*$hero->getATT();
            }
            if(null!==$hero->getMonture()){
                $AttApresEquip=$AttApresEquip+$hero->getMonture()->getFlatATT()+$hero->getMonture()->getmultATT()/100*$hero->getATT();
            }
            $hero->setATTAvecEquipement( $AttApresEquip);
            $hero->setDEFAvecEquipement($DefApresEquip);
            $hero->setPVAvecEquipement( $PvApresEquip);
            $hero->setVITAvecEquipement( $VitApresEquip);
            $herosRepository->save($hero, true);

            return $this->redirectToRoute('app_heros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('heros/edit.html.twig', [
            'hero' => $hero,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_heros_delete', methods: ['POST'])]
    public function delete(Request $request, Heros $hero, HerosRepository $herosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hero->getId(), $request->request->get('_token'))) {
            $herosRepository->remove($hero, true);
        }

        return $this->redirectToRoute('app_heros_index', [], Response::HTTP_SEE_OTHER);
    }
}
