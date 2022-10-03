<?php

namespace App\Form;

use App\Entity\Armes;
use App\Entity\Heros;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HerosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('avatar',null,[
                'help'=>'Ecrire sous format:/images/avatar/image.png',
            ])
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
