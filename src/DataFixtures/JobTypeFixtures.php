<?php
namespace App\DataFixtures;

use App\Entity\JobType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobTypeFixtures extends Fixture
{
    public const TYPES = [
        'CDI',
        'CDD',
        'Freelance',
        'Stage',
        'Alternance',
        'Temps partiel',
        'Temps plein',
        'Télétravail',
        'Mission',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TYPES as $name) {
            $type = new JobType();
            $type->setName($name);
            $manager->persist($type);
        }

        $manager->flush();
    }
}
