<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Opinions;
use App\DataFixtures\GarageFixtures;

class OpinionsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i = 1; $i <=10; $i++) {
            $Opinion = new Opinions();
            $Opinion->setName($faker->text(15))
                ->setComment($faker->text(200))
                ->setScore($faker->numberBetween(1,5))
                ->setIsModerated(false)
                ->setGarage($this->getReference(GarageFixtures::GARAGE_REFERENCE));

            $manager->persist($Opinion);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            GarageFixtures::class,
        ];
    }
}
