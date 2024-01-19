<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Brands;

class BrandsFixtures extends Fixture
{
    public const BRAND_REFERENCE = 'brand';

    public function load(ObjectManager $manager): void
    {
        $names = [
            'Chevrolet',
            'Ford',
            'Chrysler',
            'Camaro',
            'Gmc',
            'Shelby',
        ];

        for ($i=1; $i <= 6 ; $i++) {
            $brand = new Brands();

            $brand->setName($names[$i-1]);
            $this->setReference(SELF::BRAND_REFERENCE, $brand);

                $manager->persist($brand);
        }
        $manager->flush();
    }
}
