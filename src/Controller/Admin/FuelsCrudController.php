<?php

namespace App\Controller\Admin;

use App\Entity\Fuels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class FuelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fuels::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Carburant')
            ->setEntityLabelInPlural('Carburants')
            ->setPageTitle('index', 'liste des %entity_label_plural%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('name', 'Type d\'éssence'),
        ];
    }
}
