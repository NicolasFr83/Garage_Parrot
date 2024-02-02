<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\ContactPage;
class ContactPageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contactPage = new ContactPage();

        $contactPage->setTitle('title')
            ->setTextPresentation('text presentation');

            $this->assertTrue($contactPage->getTitle() === 'title');
            $this->assertTrue($contactPage->getTextPresentation() === 'text presentation');
    }

    public function testIsFalse(): void
    {
        $contactPage = new ContactPage();

        $contactPage->setTitle('title')
            ->setTextPresentation('text presentation');

            $this->assertFalse($contactPage->getTitle() === 0);
            $this->assertFalse($contactPage->getTextPresentation() === 'title');
    }

    public function testIsEmpty(): void
    {
        $contactPage = new ContactPage();

        $this->assertEmpty($contactPage->getTitle());
        $this->assertEmpty($contactPage->getTextPresentation());

    }
}
