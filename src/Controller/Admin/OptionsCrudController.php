<?php

namespace App\Controller\Admin;

use App\Entity\Options;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class OptionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Options::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Option')
            ->setEntityLabelInPlural('Options')
            ->setPageTitle('index', 'liste des %entity_label_plural%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextareaField::new('name', 'Options'),
        ];
    }
}
