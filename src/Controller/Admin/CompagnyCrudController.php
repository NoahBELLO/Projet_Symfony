<?php

namespace App\Controller\Admin;

use App\Entity\Compagny;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Intl\Countries;

class CompagnyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compagny::class;
    }

    private function getCountryNamesOnly(): array
    {
        $countryNames = Countries::getNames();
        asort($countryNames); 
        return array_combine(array_values($countryNames), array_values($countryNames));
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextEditorField::new('description'),
            TextEditorField::new('address'),
            TextEditorField::new('city'),
            ChoiceField::new('country')
            ->setChoices($this->getCountryNamesOnly())
            ->renderAsNativeWidget(),
        ];
    }
   
}
