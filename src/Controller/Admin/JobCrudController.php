<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Intl\Countries;

class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
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
            AssociationField::new('compagny')->autocomplete(),
            AssociationField::new('jobType')->autocomplete(),
            TextField::new('title'),
            TextEditorField::new('description'),
            ChoiceField::new('country')
            ->setChoices($this->getCountryNamesOnly())
            ->renderAsNativeWidget(),
            BooleanField::new('remote_allowed'),
            NumberField::new('salary_min'),
            NumberField::new('salary_max'),
        ];
    }
   
}
