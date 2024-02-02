<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Models;
class ModelsUnitTest extends TestCase
{

    public function testIsTrue(): void
    {
        $models = new Models();

        $models->setName('name');

        $this->assertTrue($models->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $models = new Models();

        $this->assertFalse($models->getName() === 'firstname');
    }

    public function testIsEmpty(): void
    {
        $models = new Models();

        $this->assertEmpty($models->getName());
    }
}

