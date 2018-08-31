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

    /** @test */
    public function testReturnsFullSpecificationOfDinosaur()
    {
        $dinosaur = new Dinosaur();

        $this->assertSame(
            'O dinossauro não-carnívoro possui 0 metros de comprimento.',
            $dinosaur->getSpecification()
        );
    }

    /** @test */
    public function testReturnsFullSpecificationOfTyrannosaurus()
    {
        $dinosaur = new Dinosaur('Tiranossauro', true);

        $dinosaur->setLength(12);
        $this->assertSame(
            'O Tiranossauro carnívoro possui 12 metros de comprimento.',
            $dinosaur->getSpecification()
        );
    }
}