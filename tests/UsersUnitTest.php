<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Users;

class UsersUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $users = new Users();

        $users->setEmail('truc@gmail.com')
            ->setName('Pierre')
            ->setFirstname('Dupont')
            ->setCreatedat(new \DateTimeImmutable)
            ->setUpdatedat(new \DateTimeImmutable);

            $this->assertTrue($users->getEmail() === 'truc@gmail.com');
            $this->assertTrue($users->getName() === 'Pierre');
            $this->assertTrue($users->getFirstname() === 'Dupont');
            $this->assertTrue($users->getCreatedat() instanceof \DateTimeImmutable);
            $this->assertTrue($users->getUpdatedat() instanceof \DateTimeImmutable);
    }

    public function testIsFalse(): void
    {
        $users = new Users();

        $users->setEmail('truc@gmail.com')
        ->setName('Pierre')
        ->setFirstname('Dupont')
        ->setCreatedat(new \DateTimeImmutable)
        ->setUpdatedat(new \DateTimeImmutable);

        $this->assertFalse($users->getEmail() === 'trucmuche@gmail.com');
        $this->assertFalse($users->getName() === 'Dupont');
        $this->assertFalse($users->getFirstname() === 'Pierre');
        $this->assertFalse($users->getCreatedat() instanceof \DateTime);
        $this->assertFalse($users->getUpdatedat() instanceof \DateTime);

    }

    public function testIsEmpty(): void
    {
        $users = new Users();

        $this->assertEmpty($users->getEmail());
        $this->assertEmpty($users->getName());
        $this->assertEmpty($users->getFirstname());
    }
}
