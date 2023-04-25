<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BetController extends AbstractController
{
    #[Route('/ajax/bet', name: 'app_bet')]
    public function index(Request $request,EntityManagerInterface $entityManager,GameRepository $gameRepository): JsonResponse
    {
        $data      = json_decode($request->getContent(),true);
        $homeGol  = $data['homeGol'];
        $awayGol  = $data['awayGol'];
        $matchId  = $data['matchId'];

        $match = $gameRepository->findOneBy([
            'id' => $matchId
        ]);

        if(empty($match)) {
            return new JsonResponse([
                'success' => false,
            ]);
        }

        $bet = $match->getBet();
        $bet
            ->setHomeScore($homeGol)
            ->setAwayScore($awayGol);

        $entityManager->persist($bet);
        $entityManager->flush();

        return new JsonResponse([
            'success' => true,
        ]);
    }
}
