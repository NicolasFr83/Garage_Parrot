<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\OpenningGarage;

class OpenningGarageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $openningGarage = new OpenningGarage();

        $openningGarage->setOpeningday('Lundi')
            ->setOpeningHourMorning('8 heures')
            ->setClosinghourmorning('12 heures')
            ->setOpeninghourafternoon('14 heures')
            ->setClosinghourafternoon('18 heures');

            $this->assertTrue($openningGarage->getOpeningday() ==='Lundi');
            $this->assertTrue($openningGarage->getOpeningHourMorning() ==='8 heures');
            $this->assertTrue($openningGarage->getClosinghourmorning() === '12 heures');
            $this->assertTrue($openningGarage->getOpeninghourafternoon() === '14 heures');
            $this->assertTrue($openningGarage->getClosinghourafternoon() === '18 heures');
    }

    public function testIsFalse(): void
    {
        $openningGarage = new OpenningGarage();

        $openningGarage->setOpeningday('Lundi')
        ->setOpeningHourMorning('8 heures')
        ->setClosinghourmorning('12 heures')
        ->setOpeninghourafternoon('14 heures')
        ->setClosinghourafternoon('18 heures');
    
        $this->assertFalse($openningGarage->getOpeningday() ==='Mardi');
        $this->assertFalse($openningGarage->getOpeningHourMorning() ==='24 heures');
        $this->assertFalse($openningGarage->getClosinghourmorning() === '15 heures');
        $this->assertFalse($openningGarage->getOpeninghourafternoon() === '19 heures');
        $this->assertFalse($openningGarage->getClosinghourafternoon() === '20 heures');
    }

    public function testIsEmpty(): void
    {
        $openningGarage = new OpenningGarage();

        $this->assertEmpty($openningGarage->getOpeningday());
        $this->assertEmpty($openningGarage->getOpeningHourMorning());
        $this->assertEmpty($openningGarage->getClosinghourmorning());
        $this->assertEmpty($openningGarage->getOpeninghourafternoon());
        $this->assertEmpty($openningGarage->getClosinghourafternoon());
    }
}
