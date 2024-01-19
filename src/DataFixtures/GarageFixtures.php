<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Garage;


class GarageFixtures extends Fixture
{
    public const GARAGE_REFERENCE = 'garage';

    public function load(ObjectManager $manager): void
    {
        $garage = new Garage();
        $garage->setName('Garage Parrot')
            ->setEmail('garage.Parrot@gmail.com')
            ->setPhonenumber('0497995420');

            $this->setReference(SELF::GARAGE_REFERENCE, $garage);

            $manager->persist($garage);

        $manager->flush();
    }
}
