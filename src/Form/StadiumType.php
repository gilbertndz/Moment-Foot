<?php

namespace App\Form;

use App\Entity\Stadium;
use App\Entity\Moment;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StadiumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control',
                ]
            ])
            ->add('City', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form-control',
                ]
            ])
            ->add('Country', TextType::class, [
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'Pays',
                    'class' => 'form-control',
                ]
            ])
            ->add('Capacity', TextType::class, [
                'label' => 'Capacité',
                'attr' => [
                    'placeholder' => 'Capacité',
                    'class' => 'form-control',
                ]
            ])

            ->add('photo', TextType::class, [
                'label' => 'url de la photo',
                'attr' => [
                    'placeholder' => 'Photo',
                    'class' => 'form-control',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stadium::class,
        ]);
    }
}
