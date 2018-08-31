<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinosaurs")
 */
class Dinosaur
{

    const LARGE = 10;

    const HUGE = 30;

    /**
     * @ORM\Column(type="integer")
     */
    private $length = 0;

    /**
     * @ORM\Column(type="string")
     */
    private $genus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCarnivorous;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enclosure", inversedBy="dinosaurs")
     */
    private $enclosure;

    
    public function __construct(string $genus = 'dinossauro', bool $isCarnivorous = false)
    {
        $this->genus = $genus;
        $this->isCarnivorous = $isCarnivorous;
    }


    /**
     * Get the value of length
     */ 
    public function getLength(): int
    {
        return $this->length;
    }


    /**
     * Set the value of length
     *
     * @return  self
     */ 
    public function setLength(int $length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the dinosaur specification
     */
    public function getSpecification(): string
    {
        return sprintf(
            'O %s %scarnívoro possui %d metros de comprimento.',
            $this->genus,
            $this->isCarnivorous ? '' : 'não-',
            $this->length
        );
    }

    /**
     * @return string
     */
    public function getGenus(): string
    {
        return $this->genus;
    }

    /**
     * @return bool
     */
    public function isCarnivorous()
    {
        return $this->isCarnivorous;
    }


}
