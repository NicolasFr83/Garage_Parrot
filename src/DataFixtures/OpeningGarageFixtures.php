<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\OpenningGarage;
use App\DataFixtures\GarageFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OpeningGarageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $days = [ 
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
        ];

        for ($i = 1; $i <= 5; $i++) {
        $openingGarage = new OpenningGarage();

        $openingGarage->setOpeningDay($days[$i-1])
            ->setOpeninghourmorning('08 h 00')
            ->setClosingHourmorning('12 h 00')
            ->setOpeninghourafternoon('14 h 00')
            ->setClosinghourafternoon('18 h 00')
            ->setGarage($this->getReference(GarageFixtures::GARAGE_REFERENCE));
        

            $manager->persist($openingGarage);
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
