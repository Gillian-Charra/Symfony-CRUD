<?php

namespace App\Form;

use App\Entity\Heros;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

            ->add('niveau')
            ->add('experience')
            ->add('fonds')
            ->add('classe')
            ->add('couvre_chef')
            ->add('bras')
            ->add('torse')
            ->add('jambes')
            ->add('pieds')
            ->add('armes',ChoiceType::class)
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
