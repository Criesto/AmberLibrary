<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use App\Entity\Czytelnik;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CzytelnikCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Czytelnik::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('firstName', 'Imię'),
            TextField::new('lastName', 'Nazwisko'),
            TextField::new('address', 'Adres'),
            TextField::new('phoneNumber', 'Numer telefonu'),
            TextField::new('email', 'e-mail'),
            ArrayField::new('wypozyczenia', 'Wypożyczenia')->onlyOnDetail(),
        ];
    }
}
