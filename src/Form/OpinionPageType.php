<?php

namespace App\Form;

use App\Entity\OpinionPage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class OpinionPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'row_attr' => [
                    'class' => 'opinion-page-form__field'
                ],
                'label' => 'Titre de la page',
                'label_attr' => [
                    'class' => 'opinion-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'opinion-page-form__field--input',
                ]
            ])
            ->add('presentationText', TextareaType::class, [
                'row_attr' => [
                    'class' => 'opinion-page-form__field'
                ],
                'label' => 'Texte de présentation',
                'label_attr' => [
                    'class' => 'opinion-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'opinion-page-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OpinionPage::class,
        ]);
    }
}
