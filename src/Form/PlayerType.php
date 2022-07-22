<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Team;
use App\Entity\Moment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom',
                    'class' => 'form-control',
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control',
                ]
            ])
            ->add('birthdate', DateType::class, [
                'label' => 'Date de naissance',
                'attr' => [
                    'placeholder' => 'Date de naissance',
                    'class' => 'form-control',
                ]
            ])
            ->add('photo', TextType::class, [
                'label' => 'url de la Photo',
                'attr' => [
                    'placeholder' => 'Photo',
                    'class' => 'form-control',
                ]
            ])
            ->add('team', EntityType::class, [
                'label' => 'Equipe',
                'class' => Team::class,
                'choice_label' => 'name',
                'attr' => [
                    'placeholder' => 'Equipe',
                    'class' => 'form-control',
                ],
                'by_reference' => false,
                'multiple' => true,
                'expanded' => false
            ])
            ->add('moments', EntityType::class, [
                'label' => 'Moments',
                'class' => Moment::class,
                'choice_label' => 'title',
                'attr' => [
                    'placeholder' => 'Moments',
                    'class' => 'form-control',
                ],
                'by_reference' => false,
                'multiple' => true,
                'expanded' => false
            ])
   
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
