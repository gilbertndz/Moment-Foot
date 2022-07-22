<?php

namespace App\DataFixtures;

use App\Entity\Moment;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class MomentFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 21; $i++) {
            $moment = new Moment();
            $moment->setTitle($faker->title());
            $moment->setDate($faker->dateTimeBetween('-100years','now'));
            $moment->setDescription($faker->text(400));
            $moment->setLink($faker->Url());   
            $moment->setPhoto($faker->imageUrl(1000, 1000));
            $moment->setRating($faker->numberBetween(0, 10));
            $manager->persist($moment);
            $this->setReference('Stadium_' . $i, $moment);
        }
        $manager->flush();
    }

}
