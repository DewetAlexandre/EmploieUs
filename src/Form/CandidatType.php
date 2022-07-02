<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Validator\Constraints as Assert;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 50]),
                new Assert\NotBlank()
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 50]),
                new Assert\NotBlank()
                ]
            ])
            ->add('genre', ChoiceType::class, [
                'attr' => [
                    'class'=> 'form-control',
                ],
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices'  => [
                    'Homme' => null,
                    'Femme' => true,
                    'Autre' => false,
                ],
            ])
            ->add('datenaissance', DateType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Date de naissance',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 80]),
                new Assert\NotBlank()
                ],
                'widget' => 'choice'
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 80]),
                new Assert\NotBlank()
                ]
            ])
            ->add('mail', EmailType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 80]),
                new Assert\NotBlank()
                ]
            ])
            ->add('motdepasse', PasswordType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 80]),
                new Assert\NotBlank()
                ]
            ])
            ->add('tel', TelType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Téléphone',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 80]),
                new Assert\NotBlank()
                ]
            ])
            ->add('cv', FileType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'CV',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 80]),
                new Assert\NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => 'Valider mes informations'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
