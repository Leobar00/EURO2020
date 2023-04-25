<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/ajax/all/game', name: 'app_game',methods: "GET")]
    public function index(GameRepository $gameRepository): JsonResponse
    {
        $allGames = $gameRepository->findAllFields();

        if(empty($allGames)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'No Games'
            ]);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'Success',
            'games'    => $allGames
        ]);
    }

    #[Route('/ajax/end/game', name: 'app_end_game',methods: "GET")]
    public function endGame(GameRepository $gameRepository): JsonResponse
    {
        $allGames = $gameRepository->findAllEndedMatch();

        if(empty($allGames)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'No Games'
            ]);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'Success',
            'games'    => $allGames
        ]);
    }

}
