<?php
// src/Controller/GameController.php
namespace App\Controller;

use App\Repository\CardRepository;
use App\Service\CardService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class GameController extends AbstractController {

    private $cardRepository;
    private $cardService;

    public function __construct(CardRepository $cardRepository, CardService $cardService) {
        $this->cardRepository = $cardRepository;
        $this->cardService = $cardService;
    }

    #[Route('/start/{sort}', name: 'start', defaults: [ "sort" => false ])]
    public function start($sort): Response {
        $hand = $this->cardRepository->generateDeck();

        if ($sort) {
            $hand = $this->cardService->sortCard($hand);
        }

        return $this->render('start.html.twig', [
            'hand' => $hand,
        ]);
    }
}
