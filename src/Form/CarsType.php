<?php

namespace App\Form;

use App\Entity\Brands;
use App\Entity\Cars;
use App\Entity\Fuels;
use App\Entity\Options;
use App\Entity\Types;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price', TextType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'Prix',
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'placeholder' => '0',
                    'class' => '',
                ]
            ])
            ->add('imageName')
            ->add('years', TextType::class, [
                'row_attr' => [
                    'class' => ''
                ],
                'label' => 'Prix',
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'placeholder' => '0',
                    'class' => '',
                ]
            ])
            ->add('kilometers', TextType::class, [
                'row_attr' => [
                    'class' => ''
                ],
                'label' => 'Kilometres',
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'placeholder' => '0',
                    'class' => '',
                ]
            ])
            ->add('carPresentationText', TextareaType::class, [
                'row_attr' => [
                    'class' => ''
                ],
                'label' => 'Prix',
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'placeholder' => '0',
                    'class' => '',
                ]
            ])
            ->add('createdAt')
            ->add('updatedAt')
            ->add('brand', EntityType::class, [
                'class' => Brands::class,
'choice_label' => 'id',
            ])
            ->add('fuel', EntityType::class, [
                'class' => Fuels::class,
'choice_label' => 'id',
            ])
            ->add('options', EntityType::class, [
                'class' => Options::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('type', EntityType::class, [
                'class' => Types::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cars::class,
        ]);
    }
}
