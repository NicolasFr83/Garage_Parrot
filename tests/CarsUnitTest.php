<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Cars;
class CarsUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $cars = new Cars();
        $cars->setPrice(1000)
            ->setImageName('image name')
            ->setYears(1980)
            ->setKilometers(100000)
            ->setCarPresentationText('text')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
    
            $this->assertTrue($cars->getPrice() === 1000);
            $this->assertTrue($cars->getImageName() === 'image name');
            $this->assertTrue($cars->getYears() === 1980);
            $this->assertTrue($cars->getKilometers() === 100000);
            $this->assertTrue($cars->getCarPresentationText() ==='text');
            $this->assertTrue($cars->getCreatedAt() instanceof \DateTimeImmutable);
            $this->assertTrue($cars->getUpdatedAt() instanceof \DateTimeImmutable);    
    }
    
    public function testIsFalse(): void
    {
        $cars = new Cars();
        $cars->setPrice(1000)
            ->setImageName('image name')
            ->setYears(1980)
            ->setKilometers(100000)
            ->setCarPresentationText('text')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable()); 
            
            $this->assertFalse($cars->getPrice() === 10);
            $this->assertFalse($cars->getImageName() === 'false');
            $this->assertFalse($cars->getYears() === 'word');
            $this->assertFalse($cars->getKilometers() === 'fake');
            $this->assertFalse($cars->getCarPresentationText() ==='sentence');    
            $this->assertFalse($cars->getCreatedAt() instanceof \DateTime);
            $this->assertFalse($cars->getUpdatedAt() instanceof \DateTime);
        }

    public function testIsEmpty(): void
    {
        $cars = new Cars();

            $this->assertEmpty($cars->getPrice());
            $this->assertEmpty($cars->getImageName());
            $this->assertEmpty($cars->getYears());
            $this->assertEmpty($cars->getKilometers());
            $this->assertEmpty($cars->getCarPresentationText());    
    }
}

