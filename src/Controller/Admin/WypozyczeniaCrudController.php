<?php

namespace App\Controller\Admin;

use App\Entity\Wypozyczenia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WypozyczeniaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wypozyczenia::class;
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
