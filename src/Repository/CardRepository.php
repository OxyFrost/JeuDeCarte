<?php
// src/Repository/CardRepository.php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CardRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Card::class);
    }

    /**
     * Génération de la main aléatoirement
     * 
     * @return $hand contenant la main de l'utilisateur
     */
    public function generateDeck() {
        // Jeu de données
        $colors = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
        $values = ['As', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Dame', 'Roi', 'Valet'];
        shuffle($colors);
        shuffle($values);

        $hand = [];
        for ($i = 0; $i < 10; $i++) {
            $card = new Card($colors[array_rand($colors)], $values[$i]);
            $hand[] = $card;
        }

        return $hand;
    }
}