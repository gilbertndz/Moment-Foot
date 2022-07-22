<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Stadium;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class StadiumFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 21; $i++) {
            $stadium = new Stadium();
            $stadium->setName($faker->name());
            $stadium->setCity($faker->city());
            $stadium->setCountry($faker->country());
            $stadium->setCapacity($faker->numberBetween(10000, 100000));
            $stadium->setPhoto($faker->imageUrl(1000, 1000));
            $manager->persist($stadium);
            $this->setReference('Stadium_' . $i, $stadium);
        }
        $manager->flush();
    }

}
