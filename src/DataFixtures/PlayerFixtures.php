<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 61; $i++) {
            $player = new Player();
            $player->setFirstname($faker->firstname());
            $player->setLastname($faker->lastname());
            $player->setBirthdate($faker->dateTimeBetween('-100years','now'));
            $player->setPhoto($faker->imageUrl(1000, 1000));
            $manager->persist($player);
            $this->setReference('Player_' . $i, $player);
        }

        $manager->flush();
    }

}
