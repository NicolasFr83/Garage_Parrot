<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Fuels;

class FuelsFixtures extends Fixture
{
    public const FUEL_REFERENCE = 'fuel';
    public function load(ObjectManager $manager): void
    {
        $names = [
            'Essence',
            'Diesel',
            'GPL',
        ];

        for ($i=1; $i <= 3 ; $i++) {
            $fuel = new Fuels();

            $fuel->setName($names[$i-1]);
            $this->setReference(SELF::FUEL_REFERENCE, $fuel);

            $manager->persist($fuel);
        }
        $manager->flush();
    }
}
