<?php

namespace App\Controller\Admin;

use App\Entity\JobCategorie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobCategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobCategorie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
        ];
    }
   
}
