<?php

namespace App\Controller\Admin;

use App\Entity\Czytelnik;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CzytelnikCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Czytelnik::class;
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
