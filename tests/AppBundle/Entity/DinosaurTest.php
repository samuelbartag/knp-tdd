<?php

namespace Tests\AppBundle\Entity;

use PHPUnit\Framework\TestCase;
use AppBundle\Entity\Dinosaur;

/**
 * ClassNameTest
 * @group group
 */
class DinosaurTest extends TestCase
{

    /** @test */
    public function testSettingLength()
    {
        $dinosaur = new Dinosaur();
        $this->assertSame(0, $dinosaur->getLength());

        $dinosaur->setLength(9);
        $this->assertSame(9, $dinosaur->getLength());
    }

    /** @test */
    public function testDinosaurHasNotShrunk()
    {
        $dinosaur = new Dinosaur();
        $dinosaur->setLength(15);

        $this->assertGreaterThan(14, $dinosaur->getLength(), 'Você colocou o dinossauro na lavadoura?');
    }
}