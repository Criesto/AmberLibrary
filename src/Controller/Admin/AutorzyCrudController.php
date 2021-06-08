<?php

namespace App\Controller\Admin;

use App\Entity\Autorzy;
use App\Entity\Ksiazki;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AutorzyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Autorzy::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('firstName', 'Imię'),
            TextField::new('lastName', 'Nazwisko'),
            ArrayField::new('ksiazki', 'Książki')->onlyOnDetail(),
        ];
    }
}
