<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CarsPage;

class CarsPageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        $carsPage = new CarsPage();
        $carsPage->setTitle($faker->word())
            ->setCarPresentationText($faker->text(200));

            $manager->persist($carsPage);
        
        $manager->flush();
    }
}
