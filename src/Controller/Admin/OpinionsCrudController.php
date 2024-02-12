<?php

namespace App\Controller\Admin;

use App\Entity\Opinions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class OpinionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opinions::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Avis')
            ->setEntityLabelInPlural('Avis')
            ->setPageTitle('index', '%entity_label_singular%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('name', "Nom"),
            TextareaField::new('comment', 'Commentaire'),
            IntegerField::new('score', 'Score'),
            DateTimeField::new('createdAt', 'Crée le')
                ->setFormTypeOption('disabled', true),
        ];
    }
}
