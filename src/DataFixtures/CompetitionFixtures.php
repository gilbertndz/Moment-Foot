<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Competition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompetitionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $competition = new Competition();
            $competition->setName($faker->name());
            $competition->setType($faker->randomElement(['Nationale', 'Continentale', 'Internationale']));
            $manager->persist($competition);
            $this->setReference('Competition_' . $i, $competition);
        }

        $manager->flush();
    }

}
