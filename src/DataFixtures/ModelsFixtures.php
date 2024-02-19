<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\BrandsFixtures;
use App\Entity\Models;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModelsFixtures extends Fixture implements DependentFixtureInterface
{
    public const MODEL_REFERENCE = 'model';
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=10; $i++) {
            $model = new Models();
            $model->setName($faker->word())
            ->setBrands($this->getReference(BrandsFixtures::BRAND_REFERENCE));
            $this->setReference(SELF::MODEL_REFERENCE, $model);

            $manager->persist($model);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BrandsFixtures::class,
        ];
    }
} 
