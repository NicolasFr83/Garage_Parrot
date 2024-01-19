<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\OpinionPage;


class OpinionPageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        $opinionpage =new OpinionPage();
        $opinionpage->setTitle($faker->text(10))
            ->setPresentationText($faker->text(200));

        $manager->persist($opinionpage);

        $manager->flush();
    }
}
