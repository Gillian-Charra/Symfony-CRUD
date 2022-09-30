<?php

namespace App\Form;

use App\Entity\Heros;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HerosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('avatar')
            ->add('description')
            ->add('date_de_naissance')
            ->add('ATT')
            ->add('DEF')
            ->add('PV')
            ->add('VIT')
            ->add('niveau')
            ->add('experience')
            ->add('fonds')
            ->add('classe')
            ->add('couvre_chef')
            ->add('bras')
            ->add('torse')
            ->add('jambes')
            ->add('pieds')
            ->add('armes')
            ->add('monture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Heros::class,
        ]);
    }
}
