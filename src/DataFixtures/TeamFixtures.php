<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 21; $i++) {
            $team = new Team();
            $team->setName($faker->name());
            $team->setCity($faker->city());
            $team->setCountry($faker->country());
            $team->setType($faker->randomElement(['Club', 'Pays']));
            $team->setLogo($faker->imageUrl(1000, 1000));
            $manager->persist($team);
            $this->setReference('Team_' . $i, $team);
        }

        $manager->flush();
    }

}
