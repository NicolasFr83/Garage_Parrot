<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture 
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {}
    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('G_Parrot@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordHasher->hashPassword($admin, 'Parrot.1'))
            ->setName('Parrot')
            ->setFirstname('Vincent');

        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <=4; $i++) {
            $employee = new Users();
            $employee->setEmail($faker->email())
                ->setPassword($this->passwordHasher->hashPassword($employee, 'Employés.1'))
                ->setName($faker->lastName())
                ->setFirstname($faker->firstName());
        
            $manager->persist($employee);
        }

        $manager->flush();
    }
}
