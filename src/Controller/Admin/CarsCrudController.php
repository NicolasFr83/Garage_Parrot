<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class CarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cars::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Voiture')
            ->setEntityLabelInPlural('Voitures')
            ->setPageTitle('index', 'liste des %entity_label_plural%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('brand', 'Marque'),
            AssociationField::new('model', 'Modèle'),
            AssociationField::new('type' ,'Type'),
            IntegerField::new('price', 'Prix'),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class),
            ImageField::new('imageName', 'Photo de la voiture')
                ->setBasePath('/uploads/cars')
                ->onlyOnIndex(),
            IntegerField::new('years', 'Année de la voiture'),
            IntegerField::new('kilometers', 'Kilometrage'),
            TextareaField::new('carPresentationText', 'Description de la voiture'),
            AssociationField::new('fuel', 'Essence'),
            AssociationField::new('options', 'Options')
        ];
    }
}
