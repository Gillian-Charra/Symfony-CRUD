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
                $DefApresEquip=$DefApresEquip+$hero->getArmes()->getFlatDEF()+($hero->getArmes()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getArmes()->getFlatPV()+($hero->getArmes()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getArmes()->getFlatVIT()+($hero->getArmes()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getCouvreChef()){
                $AttApresEquip=$AttApresEquip+$hero->getCouvreChef()->getFlatATT()+($hero->getCouvreChef()->getmultATT()/100)*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getCouvreChef()->getFlatDEF()+($hero->getCouvreChef()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getCouvreChef()->getFlatPV();
                $VitApresEquip=$VitApresEquip+$hero->getCouvreChef()->getFlatVIT()+($hero->getCouvreChef()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getTorse()){
                $AttApresEquip=$AttApresEquip+$hero->getTorse()->getFlatATT()+$hero->getTorse()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getTorse()->getFlatDEF()+($hero->getTorse()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getTorse()->getFlatPV()+($hero->getTorse()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getTorse()->getFlatVIT()+($hero->getTorse()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getBras()){
                $AttApresEquip=$AttApresEquip+$hero->getBras()->getFlatATT()+$hero->getBras()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getBras()->getFlatDEF()+($hero->getBras()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getBras()->getFlatPV()+($hero->getBras()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getBras()->getFlatVIT()+($hero->getBras()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getJambes()){
                $AttApresEquip=$AttApresEquip+$hero->getJambes()->getFlatATT()+$hero->getJambes()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getJambes()->getFlatDEF()+($hero->getJambes()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getJambes()->getFlatPV()+($hero->getJambes()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getJambes()->getFlatVIT()+($hero->getJambes()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getPieds()){
                $AttApresEquip=$AttApresEquip+$hero->getPieds()->getFlatATT()+$hero->getPieds()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getPieds()->getFlatDEF()+($hero->getPieds()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getPieds()->getFlatPV()+($hero->getPieds()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getPieds()->getFlatVIT()+($hero->getPieds()->getmultVIT()/100)*$hero->getVIT();            
            }
            if(null!==$hero->getMonture()){
                $AttApresEquip=$AttApresEquip+$hero->getPieds()->getFlatATT()+$hero->getMonture()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getPieds()->getFlatDEF()+($hero->getPieds()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getPieds()->getFlatPV()+($hero->getPieds()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getPieds()->getFlatVIT()+($hero->getPieds()->getmultVIT()/100)*$hero->getVIT();
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
                $DefApresEquip=$DefApresEquip+$hero->getArmes()->getFlatDEF()+($hero->getArmes()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getArmes()->getFlatPV()+($hero->getArmes()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getArmes()->getFlatVIT()+($hero->getArmes()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getCouvreChef()){
                $AttApresEquip=$AttApresEquip+$hero->getCouvreChef()->getFlatATT()+($hero->getCouvreChef()->getmultATT()/100)*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getCouvreChef()->getFlatDEF()+($hero->getCouvreChef()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getCouvreChef()->getFlatPV();
                $VitApresEquip=$VitApresEquip+$hero->getCouvreChef()->getFlatVIT()+($hero->getCouvreChef()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getTorse()){
                $AttApresEquip=$AttApresEquip+$hero->getTorse()->getFlatATT()+$hero->getTorse()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getTorse()->getFlatDEF()+($hero->getTorse()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getTorse()->getFlatPV()+($hero->getTorse()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getTorse()->getFlatVIT()+($hero->getTorse()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getBras()){
                $AttApresEquip=$AttApresEquip+$hero->getBras()->getFlatATT()+$hero->getBras()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getBras()->getFlatDEF()+($hero->getBras()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getBras()->getFlatPV()+($hero->getBras()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getBras()->getFlatVIT()+($hero->getBras()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getJambes()){
                $AttApresEquip=$AttApresEquip+$hero->getJambes()->getFlatATT()+$hero->getJambes()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getJambes()->getFlatDEF()+($hero->getJambes()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getJambes()->getFlatPV()+($hero->getJambes()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getJambes()->getFlatVIT()+($hero->getJambes()->getmultVIT()/100)*$hero->getVIT();
            }
            if(null!==$hero->getPieds()){
                $AttApresEquip=$AttApresEquip+$hero->getPieds()->getFlatATT()+$hero->getPieds()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getPieds()->getFlatDEF()+($hero->getPieds()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getPieds()->getFlatPV()+($hero->getPieds()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getPieds()->getFlatVIT()+($hero->getPieds()->getmultVIT()/100)*$hero->getVIT();            
            }
            if(null!==$hero->getMonture()){
                $AttApresEquip=$AttApresEquip+$hero->getPieds()->getFlatATT()+$hero->getMonture()->getmultATT()/100*$hero->getATT();
                $DefApresEquip=$DefApresEquip+$hero->getPieds()->getFlatDEF()+($hero->getPieds()->getmultDEF()/100)*$hero->getDEF();
                $PvApresEquip=$PvApresEquip+$hero->getPieds()->getFlatPV()+($hero->getPieds()->getmultPV()/100)*$hero->getPV();
                $VitApresEquip=$VitApresEquip+$hero->getPieds()->getFlatVIT()+($hero->getPieds()->getmultVIT()/100)*$hero->getVIT();
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
