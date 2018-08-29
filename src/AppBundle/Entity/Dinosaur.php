<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinosaurs")
 */
class Dinosaur
{
    /**
     * @ORM\Column(type="integer")
     */
    private $length = 0;


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
}
