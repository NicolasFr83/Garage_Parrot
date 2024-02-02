<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Garage;

class GarageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $garage = new Garage();

        $garage->setName('name')
            ->setEmail('garage_Parrot@gmail.com')
            ->setPhoneNumber('0494999897');

            $this->assertTrue($garage->getName() === 'name');
            $this->assertTrue($garage->getEmail() === 'garage_Parrot@gmail.com');
            $this->assertTrue($garage->getPhoneNumber() === '0494999897');       
    }

    public function testIsFalse(): void
    {
        $garage = new Garage();

        $garage->setName('name')
            ->setEmail('garage_Parrot@gmail.com')
            ->setPhoneNumber('0494999897');

            $this->assertFalse($garage->getName() === 'firstname');
            $this->assertFalse($garage->getEmail() === 'garage_quinto@hotmail.fr');
            $this->assertFalse($garage->getPhoneNumber() === '0494991251');       
    }

    public function testIsEmpty(): void
    {
        $garage = new Garage();

        $this->assertEmpty($garage->getName());
        $this->assertEmpty($garage->getEmail());
        $this->assertEmpty($garage->getPhoneNumber());       
    }
}
