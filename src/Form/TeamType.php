<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Moment;
use App\Entity\Competition;
use App\Entity\Player;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control',
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form-control',
                ]
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'Pays',
                    'class' => 'form-control',
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'choices' => [
                    'Club' => 'Club',
                    'Pays' => 'Pays',
                ],
                'attr' => [
                    'placeholder' => 'Type',
                    'class' => 'form-control',
                ]
            ])
            ->add('logo', TextType::class, [
                'label' => 'url du logo',
                'attr' => [
                    'placeholder' => 'Logo',
                    'class' => 'form-control',
                ]
            ])
            ->add('players', EntityType::class, [
                'label' => 'Joueurs',
                'class' => Player::class,
                'choice_label' => 'firstname', 'lastname',
                'attr' => [
                    'placeholder' => 'Joueurs',
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
            ->add('competitions', EntityType::class, [
                'label' => 'Competitions',
                'class' => Competition::class,
                'choice_label' => 'name',
                'attr' => [
                    'placeholder' => 'Competitions',
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
            'data_class' => Team::class,
        ]);
    }
}
