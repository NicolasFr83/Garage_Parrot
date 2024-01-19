<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Options;

class OptionsFixtures extends Fixture
{
    public const OPTION_REFERENCE = 'option';
    public function load(ObjectManager $manager): void
    {
        $name =[ 
            'ABS',
            'Vitres électriques',
            'Climatisation',
            'Gps',
            'Airbags',
            '4x4',
            'Sièges chauffant',
            'Toit ouvrant',
            'radar de recul',
            'Caméra de recul',
            'Jantes alu',
            'Intérieur cuir',
            'Régulateur de vitesse',
            'ESP',
            'Feux antibrouillard',
            'Boîte automatique',
            'Boîte manuelle',
        ];

        for( $i = 1; $i <= 17; $i++ ) {
            $option = new options();
            
            $option->setName($name[$i-1]);
            $this->setReference(SELF::OPTION_REFERENCE, $option);

            $manager->persist($option);
        }
        $manager->flush();
    }
}
