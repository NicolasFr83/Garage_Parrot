<?php

namespace App\Form;

use App\Entity\HomePage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HomePageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pageTitle', TextType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Titre de la page',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('welcomeText', TextareaType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Texte de bienvenue',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('repairSectionTitle', TextType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Titre de la section réparation',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            
            ->add('repairSectionText', TextareaType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Texte de bienvenue',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('usedCarsSectionTitle' , TextType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Titre de la section voitures d\'occasions',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('usedCarsSectionText' , TextareaType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Texte de la section des voitures d\'occasions',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('opinionsSectionTitle' , TextType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Titre de la section des avis',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('opinionsSectionText' , TextareaType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Texte de la section des avis',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HomePage::class,
        ]);
    }
}
