<?php

namespace App\Form;

use App\Entity\Opinions;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OpinionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'opinion-form__field'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'opinion-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'opinion-form__field--input',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner un nom',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit contenir au moins 2 caractères',
                        'max' => 50,
                        'maxMessage' => 'Votre nom ne doit pas dépasser 50 caractères',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Votre nom ne doit contenir que des lettres'
                    ]),
                ],
            ])
            ->add('comment',TextareaType::class, [
                'row_attr' => [
                    'class' => 'opinion-form__field'
                ],
                'label' => 'commentaire',
                'label_attr' => [
                    'class' => 'opinion-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre Avis',
                    'class' => 'register-form__field--input',
                ]
            ])
            ->add('score', IntegerType::class, [
                'row_attr' => [
                    'class' => 'opinion-form__field'
                ],
                'label' => 'Score entre 1 et 5',
                'label_attr' => [
                    'class' => 'opinion-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'cochez une étoile ',
                    'class' => 'opinion-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opinions::class,
        ]);
    }
}
