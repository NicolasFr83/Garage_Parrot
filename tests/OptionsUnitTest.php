<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Options;

class OptionsUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $options = new Options();

        $options->setName('name');

        $this->assertTrue($options->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $options = new Options();

        $options->setName('name');

        $this->assertFalse($options->getName() === 'chevrolet');
    }

    public function testIsEmpty(): void
    {
        $options = new Options();

        $this->assertEmpty($options->getName());
    }
}
