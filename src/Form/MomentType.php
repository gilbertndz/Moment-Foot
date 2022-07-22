<?php

namespace App\Form;

use App\Entity\Moment;
use App\Entity\Stadium;
use App\Entity\Team;
use App\Entity\Competition;
use App\Entity\Player;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MomentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre',
                    'class' => 'form-control',
                ]
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'attr' => [
                    'placeholder' => 'Date',
                    'class' => 'form-control',
                ]
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => 'form-control',
                ]
            ])
            ->add('link', TextType::class, [
                'label' => 'Lien vers la vidéo',
                'attr' => [
                    'placeholder' => 'Lien',
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
            ->add('rating', TextType::class, [
                'label' => 'Note',
                'attr' => [
                    'placeholder' => 'Note',
                    'class' => 'form-control',
                ]
            ])
            ->add('player', EntityType::class, [
                'label' => 'Joueur',
                'class' => Player::class,
                'choice_label' => 'firstname', 'lastname',
                'attr' => [
                    'placeholder' => 'Joueur',
                    'class' => 'form-control',
                ],
                'by_reference' => false,
                'multiple' => true,
                'expanded' => false
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
            ->add('competition', EntityType::class, [
                'label' => 'Competition',
                'class' => Competition::class,
                'choice_label' => 'name',
                'attr' => [
                    'placeholder' => 'Competition',
                    'class' => 'form-control',
                ],
                'by_reference' => false,
                'multiple' => true,
                'expanded' => false
            ])
            ->add('stadium', EntityType::class, [
                'label' => 'Stade',
                'class' => Stadium::class,
                'choice_label' => 'name',
                'attr' => [
                    'placeholder' => 'Stade',
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
            'data_class' => Moment::class,
        ]);
    }
}
