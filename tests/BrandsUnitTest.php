<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Brands;

class BrandsUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $brand = new Brands();

        $brand->setName('name');
        
        $this->assertTrue($brand->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $brand = new Brands();

        $brand->setName('name');

        $this->assertFalse($brand->getName() === 'false');
    }

    public function testIsEmpty(): void
    {
        $brand = new Brands();

        $this->assertEmpty($brand->getName());
    }
}
