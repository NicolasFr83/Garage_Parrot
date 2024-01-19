<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Types;

class TypesFixtures extends Fixture 
{
    public const TYPE_REFERENCE = 'type';
    public function load(ObjectManager $manager): void
    {
        $name = [ 
            'Berline',
            'Sportive',
            'Suv',
            'Citadine',
        ];

        for( $i = 1; $i <= 4; $i++ ) {
            $type = new Types();

            $type->setName($name[$i-1]);
            $this->setReference(SELF::TYPE_REFERENCE, $type);
        
            $manager->persist($type);
        }
        $manager->flush();
    }
}
