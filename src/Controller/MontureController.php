<?php 
namespace App\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Monture;
use App\Repository\MontureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/monture')]
class MontureController extends AbstractController
{
    #[Route('/',name:'app_monture_index',methods:['GET'])]
    public function index(MontureRepository $montureRepository)
    {
        return $this -> render('monture/index.html.twig',[
            'monture' => $montureRepository -> findAll(),]);
    }


    #[Route('/create', name: 'app_monture_create')]
    public function create(MontureRepository $repository): Response
    {

        $monture = new Monture;
        $form = $this->createFormBuilder($monture)
        ->setAction($this->generateUrl('app_monture_save',["id"=>0]))
        ->setMethod('POST')
        ->add('nom')
        ->add('description')
        ->add('flat_ATT')
        ->add('flat_DEF')
        ->add('flat_PV')
        ->add('flat_VIT')
        ->add('mult_ATT')
        ->add('mult_DEF')
        ->add('mult_PV')
        ->add('mult_VIT')
        ->add('prix')
        ->add('save', SubmitType::class, ['label' => 'Nouvelle monture'])
        ->getForm();
        return $this->render('monture/create.html.twig', [
            'monture'=>$monture,
            'form'=>$form->createView(),
        ]);
    }
    #[Route('/monture/save/{id}', name: 'app_monture_save')]
    public function save(int $id, MontureRepository $repository)
    {
        $monture=new Monture();
        if ($id=0){
            $monture=new Monture();
        }else{
            $monture=$repository -> find($id);        }
        
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

    #[Route('/edit/{id}', name: 'app_monture_edit')]
    public function edit (Request $request ,$id,MontureRepository $repository)
    {

        $monture=$repository -> find($id);
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

    #[Route('/delete/{id}', name: 'app_monture_delete',)]
    public function delete(Request $request, $id, MontureRepository $montureRepository): Response
    {
        $monture = $montureRepository->find($id);  
        $montureRepository->remove($monture, true);

        
        return $this->redirectToRoute('app_monture_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/show/{id}', name: 'app_monture_show', methods: ['GET'])]
    public function show(Monture $monture): Response
    {
        return $this->render('monture/show.html.twig', [
            'monture' => $monture,
        ]);
    }



}