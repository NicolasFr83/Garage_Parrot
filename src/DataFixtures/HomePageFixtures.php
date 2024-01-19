<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\HomePage;

class HomePageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $homePage = new HomePage();
        $homePage->setPageTitle($faker->text(10))
        ->setWelcomeText($faker->text(50))
        ->setRepairSectionTitle($faker->text(10))
        ->setRepairSectionText($faker->text(50))
        ->setUsedCarsSectionTitle($faker->text(10))
        ->setUsedCarsSectionText($faker->text(50))
        ->setOpinionsSectionTitle($faker->text(10))
        ->setOpinionsSectionText($faker->text(50));

        $manager->persist($homePage);
        
        $manager->flush();
    }
}
