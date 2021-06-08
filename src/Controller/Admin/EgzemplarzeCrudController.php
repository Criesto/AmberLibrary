<?php

namespace App\Controller\Admin;

use App\Entity\Egzemplarze;
use App\Entity\Ksiazki;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EgzemplarzeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Egzemplarze::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('ksiazka', 'Książka'),
            TextField::new('wypozyczenia', 'Status wypożyczenia')->onlyOnDetail(),
        ];
    }
}
