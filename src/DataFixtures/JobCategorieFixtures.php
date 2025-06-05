<?php
namespace App\DataFixtures;

use App\Entity\JobCategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobCategorieFixtures extends Fixture
{
    public const CATEGORIES = [
        'Informatique',
        'Marketing',
        'Ressources Humaines',
        'Finance',
        'Santé',
        'Éducation',
        'Construction',
        'Logistique',
        'Vente',
        'Service Client',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $name) {
            $categorie = new JobCategorie();
            $categorie->setName($name);
            $manager->persist($categorie);
        }

        $manager->flush();
    }
}
