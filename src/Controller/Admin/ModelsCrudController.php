<?php

namespace App\Controller\Admin;

use App\Entity\Models;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ModelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Models::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Modèle')
            ->setEntityLabelInPlural('Mdèles')
            ->setPageTitle('index', '%entity_label_singular%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('brands', 'Marque'),
            TextField::new('name', 'Modèle de voiture'),
        ];
    }
}
