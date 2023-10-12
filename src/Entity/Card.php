<?php
// src/Entity/Card.php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card {
    private $color;
    private $value;

    /**
     * @param $color Couleur de la carte
     * @param $value Valeur de la carte
     */
    public function __construct($color, $value) {
        $this->color = $color;
        $this->value = $value;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }
}
