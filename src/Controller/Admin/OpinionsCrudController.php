<?php

namespace App\Controller\Admin;

use App\Entity\Opinions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
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
            ->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            IdField::new('id')->hideOnForm(),
            BooleanField::new('isModerated', 'Modération'),
            DateTimeField::new('createdAt', 'Crée le')->setFormTypeOption('disabled', true),
            TextField::new('name', 'Nom')->setFormTypeOption('disabled', true),
            TextareaField::new('comment', 'Commentaire')->setFormTypeOption('disabled', true),
            IntegerField::new('score', 'Score')->setFormTypeOption('disabled', true),
            AssociationField::new('garage', 'Garage')->setFormTypeOption('disabled', true),
        ];

        if ($pageName === Crud::PAGE_NEW) {
            $fields[] = TextField::new('name', "Nom");
            $fields[] = TextareaField::new('comment', 'Commentaire');
            $fields[] = IntegerField::new('score', 'Score');
            $fields[] = AssociationField::new('garage', 'Garage');
        }

        return $fields;
    }
}