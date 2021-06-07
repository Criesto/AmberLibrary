<?php

namespace App\Controller\Admin;

use App\Entity\Ksiazki;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KsiazkiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ksiazki::class;
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
