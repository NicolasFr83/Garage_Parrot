<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Employé')
            ->setEntityLabelInPlural('Employés')
            ->setPageTitle('index', 'Liste des %entity_label_plural%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            EmailField::new('email', 'E-mail'),
            ArrayField::new('roles', 'Rôles'),
            TextField::new('password', 'Mot de passe')
            ->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('firstname', 'Prénom'),
            DateTimeField::new('createdAt', 'Créé le'),
            DateTimeField::new('updatedAt', 'Modifié le'),
        ];
    }
}
