<?php

namespace App\Controller\Admin;

use App\Entity\Regions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RegionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Regions::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameRegions','Nom de la région'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/new', 'regions/new.html.twig')
            ->overrideTemplate('crud/index', 'regions/index.html.twig')
            ->overrideTemplate('crud/edit', 'regions/edit.html.twig')

        ;
    }
    
}
