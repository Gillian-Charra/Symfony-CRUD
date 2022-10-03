<?php 
namespace App\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Monture;
use App\Repository\MontureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/monture')]
class MontureController extends AbstractController
{
    #[Route('/create', name: 'app_monture_create')]
    public function create(MontureRepository $repository): Response
    {

        $monture = new Monture;
        $form = $this->createFormBuilder($monture)
        ->setAction($this->generateUrl('app_monture_save'))
        ->setMethod('POST')
        ->add('nom', TextType::class)
        ->add('description',  TextType::class)
        ->add('flat_ATT', TextType::class)
        ->add('flat_DEF', TextType::class)
        ->add('flat_PV', TextType::class)
        ->add('flat_VIT', TextType::class)
        ->add('mult_ATT', TextType::class)
        ->add('mult_DEF', TextType::class)
        ->add('mult_PV',  TextType::class)
        ->add('mult_VIT', TextType::class)
        ->add('prix', TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Nouvelle monture'])
        ->getForm();
        return $this->render('monture/create.html.twig', [
            'monture'=>$monture,
            'form'=>$form->createView(),
        ]);
    }
    #[Route('/monture/save', name: 'app_monture_save')]
    public function save(MontureRepository $repository)
    {
        $monture=new Monture();
        $monture->setNom($_POST["form"]["nom"]);
        $monture->setDescription($_POST["form"]["description"]);
        $monture->setFlatATT($_POST["form"]["flat_ATT"]);
        $monture->setFlatDEF($_POST["form"]["flat_DEF"]);
        $monture->setFlatPV($_POST["form"]["flat_PV"]);
        $monture->setFlatVIT($_POST["form"]["flat_VIT"]);
        $monture->setMultATT($_POST["form"]["mult_ATT"]);
        $monture->setMultDEF($_POST["form"]["mult_DEF"]);
        $monture->setMultPV($_POST["form"]["mult_PV"]);
        $monture->setMultVIT($_POST["form"]["mult_VIT"]);
        $monture->setPrix($_POST["form"]["prix"]);
        $repository->save($monture,true);
        //var_dump($monture);
        return $this->redirect('/monture');
    }




}
