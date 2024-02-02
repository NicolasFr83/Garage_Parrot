<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Opinions;

class OpinionsUnitTest extends TestCase
{

    public function testIsTrue(): void
    {
        $opinion = new Opinions();

        $opinion->setName('name')
            ->setComment('commentaire')
            ->setScore(2)
            ->setCreatedAt( new \DateTimeImmutable());

            $this->assertTrue($opinion->getName() ==='name');
            $this->assertTrue($opinion->getComment() === 'commentaire');
            $this->assertTrue($opinion->getScore() === 2);
            $this->assertTrue($opinion->getCreatedAt() instanceof \DateTimeImmutable);
    }

    public function testIsFalse(): void
    {
        $opinion = new Opinions();

        $opinion->setName("name")
        ->setComment('commentaire')
        ->setScore(5)
        ->setCreatedAt( new \DateTimeImmutable());

        $this->assertFalse($opinion->getName() ==='nom');
        $this->assertFalse($opinion->getComment() === 'comment');
        $this->assertFalse($opinion->getScore() === 1);
        $this->assertFalse($opinion->getCreatedAt() instanceof \DateTime);
    }

    public function testIsEmpty(): void
    {
        $opinion = new Opinions();

        $this->assertEmpty($opinion->getName());
        $this->assertEmpty($opinion->getComment());
        $this->assertEmpty($opinion->getScore());
    }
}
