<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ContactPage;

class ContactPageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        $contactPage = new ContactPage();
        $contactPage->setTitle($faker->word())
            ->setTextPresentation($faker->text(200));

            $manager->persist($contactPage);

        $manager->flush();
    }
}
