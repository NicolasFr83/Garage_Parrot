<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\OpinionPage;

class OpinionPageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $opinionPage = new OpinionPage();

        $opinionPage->setTitle('title')
            ->setPresentationText('presentation');

            $this->assertTrue($opinionPage->getTitle() ==='title');
            $this->assertTrue($opinionPage->getPresentationText() ==='presentation');
    }

    public function testIsFalse(): void
    {
        $opinionPage = new OpinionPage();

        $opinionPage->setTitle('title')
            ->setPresentationText('presentation');

            $this->assertFalse($opinionPage->getTitle() === 'titre');
            $this->assertFalse($opinionPage->getPresentationText() ==='bienvenue');
    }

    public function testIsEmpty(): void
    {
        $opinionPage = new OpinionPage();

        $this->assertEmpty($opinionPage->getTitle());
        $this->assertEmpty($opinionPage->getPresentationText());
    }
}
