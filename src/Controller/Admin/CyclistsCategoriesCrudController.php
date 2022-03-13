<?php

namespace App\Controller\Admin;

use App\Entity\CyclistsCategories;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CyclistsCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CyclistsCategories::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
