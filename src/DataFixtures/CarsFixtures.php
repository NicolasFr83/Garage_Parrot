<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cars;
use App\DataFixtures\FuelsFixtures;
use App\DataFixtures\OptionsFixtures;
use App\DataFixtures\TypesFixtures;
use App\DataFixtures\BrandsFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class CarsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=10; $i++) {
            $car = new Cars();
            $car->setPrice($faker->numberBetween(0,900000))
                ->setImageName('default.jpg')
                ->setYears($faker->numberBetween(1900,2024))
                ->setKilometers($faker->numberBetween(1,300000))
                ->setCarPresentationText($faker->text(255))
                ->setBrand($this->getReference(BrandsFixtures::BRAND_REFERENCE))
                ->addOption($this->getReference(OptionsFixtures::OPTION_REFERENCE))
                ->setFuel($this->getReference(FuelsFixtures::FUEL_REFERENCE))
                ->setType($this->getReference(TypesFixtures::TYPE_REFERENCE));

            $manager->persist($car);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BrandsFixtures::class,
            OptionsFixtures::class,
            FuelsFixtures::class,
            TypesFixtures::class,
        ];
    }
}
