<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\HomePage;

class HomePageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $homePage = new HomePage();

        $homePage->setPageTitle('title')
            ->setWelcomeText('welcome')
            ->setRepairSectionTitle('reparation')
            ->setRepairSectionText('text reparation')
            ->setUsedCarsSectionTitle('voitures d\'occasions')
            ->setUsedCarsSectionText('voitures');

            $this->assertTrue($homePage->getPageTitle() === 'title');
            $this->assertTrue($homePage->getWelcomeText() === 'welcome');
            $this->assertTrue($homePage->getRepairSectionTitle() === 'reparation');
            $this->assertTrue($homePage->getRepairSectionText() === 'text reparation');
            $this->assertTrue($homePage->getusedCarsSectionTitle() === 'voitures d\'occasions');
            $this->assertTrue($homePage->getusedCarsSectionText() === 'voitures');
    }

    public function testIsFalse(): void
    {
        $homePage = new HomePage();

        $homePage->setPageTitle('title')
            ->setWelcomeText('welcome')
            ->setRepairSectionTitle('reparation')
            ->setRepairSectionText('text reparation')
            ->setUsedCarsSectionTitle('voitures d\'occasions')
            ->setUsedCarsSectionText('voitures');

            $this->assertFalse($homePage->getPageTitle() === 'bonjour');
            $this->assertFalse($homePage->getWelcomeText() === 'bienvenue');
            $this->assertFalse($homePage->getRepairSectionTitle() === 'occasions');
            $this->assertFalse($homePage->getRepairSectionText() === 'text de bienvenue');
            $this->assertFalse($homePage->getusedCarsSectionTitle() === 'voitures neuves');
            $this->assertFalse($homePage->getusedCarsSectionText() === 'motos');
    }

    public function testIsEmpty(): void
    {
        $homePage = new HomePage();

        $this->assertEmpty($homePage->getPageTitle());
        $this->assertEmpty($homePage->getWelcomeText());
        $this->assertEmpty($homePage->getRepairSectionTitle());
        $this->assertEmpty($homePage->getRepairSectionText());
        $this->assertEmpty($homePage->getusedCarsSectionTitle());
        $this->assertEmpty($homePage->getusedCarsSectionText());
    }
}
