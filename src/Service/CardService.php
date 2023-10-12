<?php

// src/Service/MessageGenerator.php
namespace App\Service;

class CardService
{
    public function sortCard($hand): array
    {
        usort($hand, function($a, $b) {
            $ColorsOrder = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
            $valueOrders = ['As', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Dame', 'Valet', 'Roi'];

            if ($a->getColor() == $b->getColor()) {
                return array_search($a->getValue(), $valueOrders) - array_search($b->getValue(), $valueOrders);
            }

            return array_search($a->getColor(), $ColorsOrder) - array_search($b->getColor(), $ColorsOrder);
        });

        return $hand;
    }
}