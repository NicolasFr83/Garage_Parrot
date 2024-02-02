<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Types;

class TypesUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $types = new Types();

        $types->setName('essence');

        $this->assertTrue($types->getName() === 'essence');
    }

    public function testIsFalse(): void
    {
        $types = new Types();

        $types->setName('essence');

        $this->assertFalse($types->getName() === 'diesel');
    }

    public function testIsEmpty(): void
    {
        $types = new Types();

        $this->assertEmpty($types->getName());
    }
}
