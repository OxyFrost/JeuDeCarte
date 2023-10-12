<?php
// src/Controller/GameController.php
namespace App\Controller;

use App\Repository\CardRepository;
use App\Service\CardService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function start(bool $sort, Request $request): Response {
        $sessionCard = $request->getSession();

        if ($sort) {
            $hand = $sessionCard->get('hand');
            $hand = $this->cardService->sortCard($hand);
        } else {
            $hand = $this->cardRepository->generateDeck();
            $sessionCard->set('hand', $hand);
        }

        return $this->render('start.html.twig', [
            'hand' => $hand,
        ]);
    }
}
