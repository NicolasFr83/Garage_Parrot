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

class CarsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price')
            ->add('imageName')
            ->add('years')
            ->add('kilometers')
            ->add('carPresentationText')
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
