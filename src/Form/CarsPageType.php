<?php

namespace App\Form;

use App\Entity\CarsPage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class CarsPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'row_attr' => [
                    'class' => 'cars-page-form__field'
                ],
                'label' => 'Titre de la page',
                'label_attr' => [
                    'class' => 'cars-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'cars-page-form__field--input',
                ]
            ])
            ->add('carPresentationText' , TextareaType::class, [
                'row_attr' => [
                    'class' => 'cars-page-form__field'
                ],
                'label' => 'Texte de présentation',
                'label_attr' => [
                    'class' => 'cars-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'cars-page-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarsPage::class,
        ]);
    }
}
