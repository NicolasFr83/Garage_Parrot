<?php

namespace App\Controller\Admin;

use App\Entity\HomePage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class HomePageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomePage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Page d\'accueil')
            ->setEntityLabelInPlural('pages d\'accueils')
            ->setPageTitle('index', 'liste des %entity_label_singular%')
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
            TextField::new('pagetitle' , 'Titre de la page'),
            TextareaField::new('welcomeText', 'Texte de bienvenue'),
            TextField::new('repairSectionTitle', 'Titre de la section réparation'),
            TextareaField::new('repairSectionText', 'Texte de la section réparation'),
            TextField::new('usedCarsSectionTitle', 'Titre de la section des voitures d\'occasions'),
            TextareaField::new('usedCarsSectionText', 'Texte de la section des voitures d\'occasions'),
            TextField::new('opinionsSectionTitle', 'Titre de la section des avis'),
            TextareaField::new('opinionsSectionText', 'Texte de la section des avis'),
        ];
    }
    
}
