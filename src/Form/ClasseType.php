<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Competences;
use App\Repository\CompetencesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ClasseType extends AbstractType
{
    public function __construct(private UrlGeneratorInterface $url)
    {
        
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('base_ATT',null,[
                'label'=>'Attaque'
            ])
            ->add('base_DEF',null,[
                'label'=>'Defense'
            ])
            ->add('base_PV',null,[
                'label'=>'Points de vie'
            ])
            ->add('base_VIT',null,[
                'label'=>'Vitesse'
            ])
            ->add('competences'
            ,ChoixMultiple::class,[
                'class'=>Competences::class,
                'search'=>$this->url->generate('competences'),
            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
