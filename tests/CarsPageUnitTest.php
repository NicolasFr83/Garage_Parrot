<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\CarsPage;
class CarsPageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $carsPage = new CarsPage();

        $carsPage->setTitle('title')
            ->setCarPresentationText('text');
    
            $this->assertTrue($carsPage->getTitle() === 'title');
            $this->assertTrue($carsPage->getCarPresentationText() === 'text');
    }
    public function testIsFalse(): void
    {
        $carsPage = new CarsPage();

        $carsPage->setTitle('title')
            ->setCarPresentationText('text');

            $this->assertFalse($carsPage->getTitle() === 'texte');
            $this->assertFalse($carsPage->getCarPresentationText() === 'word');
    }

    public function testIsEmpty(): void
    {
        $carsPage = new CarsPage();

            $this->assertEmpty($carsPage->getTitle());
            $this->assertEmpty($carsPage->getCarPresentationText());
    }
}
