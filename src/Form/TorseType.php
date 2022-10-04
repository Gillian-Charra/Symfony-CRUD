<?php

namespace App\Form;

use App\Entity\Torse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TorseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Torse::class,
        ]);
    }
}
