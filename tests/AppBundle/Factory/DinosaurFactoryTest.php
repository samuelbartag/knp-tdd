<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/08/18
 * Time: 21:39
 */

namespace Tests\AppBundle\Factory;


use AppBundle\Entity\Dinosaur;
use AppBundle\Factory\DinosaurFactory;
use PHPUnit\Framework\TestCase;

class DinosaurFactoryTest extends TestCase
{
    /**
     * @var DinosaurFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new DinosaurFactory();
    }

    public function testItGrowsAVelociraptor()
    {
        $dinosaur = $this->factory->growVelociraptor(5);

        $this->assertInstanceOf(Dinosaur::class, $dinosaur);
        $this->assertInternalType('string', $dinosaur->getGenus());
        $this->assertSame('Velociraptor', $dinosaur->getGenus());
        $this->assertSame(5, $dinosaur->getLength());
    }

    public function testItGrowsATriceratops()
    {
        $this->markTestIncomplete('Aguardando confirmação');
    }

    public function testItGrowsABabyVelociraptor()
    {
        if(!class_exists('Nanny')) {
            $this->markTestSkipped('Ninguém deve ver o bebê');
        }

        $dinosaur = $this->factory->growVelociraptor(1);

        $this->assertSame(1, $dinosaur->getLength());
    }

    /**
     * @dataProvider getSpecificationTests
     */
    public function testItGrowsADinosaurFromASpecification(string $spec, bool $expectedIsLarge, bool $expectedIsCarnivorous)
    {
        $dinosaur = $this->factory->growFromSpecification($spec);

        if ($expectedIsLarge)
            $this->assertGreaterThanOrEqual(Dinosaur::LARGE, $dinosaur->getLength());
        else
            $this->assertLessThan(Dinosaur::LARGE, $dinosaur->getLength());

        $this->assertSame($expectedIsCarnivorous, $dinosaur->isCarnivorous(), 'Dieta não confirma');
    }

    /**
     * @dataProvider getHugeDinosaurSpecTests
     */
    public function testItGrowsAHugeDinsaur(string $specification)
    {
        $dinosaur = $this->factory->growFromSpecification($specification);

        $this->assertGreaterThanOrEqual(Dinosaur::HUGE, $dinosaur->getLength());
    }

    public function getSpecificationTests()
    {
        return [
            // specification, is large, is carnivorous
            ['large carnivorous dinosaur', true, true],
            'default response' => ['give me all the cookies!!!', false, false],
            ['large herbivore', true, false],
        ];
    }

    public function getHugeDinosaurSpecTests()
    {
        return [
            ['huge dinosaur'],
            ['huge dino'],
            ['huge'],
            ['OMG'],
            ['😱'],
        ];
    }
}