<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Fuels;
class FuelsUnitTest extends TestCase
{
    public function testIsTrue(): void 
    {
        $fuels = new Fuels();

        $fuels->setName('name');

        $this->assertTrue($fuels->getName()==='name');
    }

    public function testIsFalse(): void
    {
        $fuels = new Fuels();

        $fuels->setName('name');

        $this->assertFalse($fuels->getName()=== 'firstname');
    }

    public function testIsEmpty(): void
    {
        $fuels = new Fuels();

        $this->assertEmpty($fuels->getName());
    }
}
