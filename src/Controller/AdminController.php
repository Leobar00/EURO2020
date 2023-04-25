<?php

namespace App\Controller;

use App\Entity\Game;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/ajax/create/match', name: 'app_create_match')]
    public function createMatch(Request $request, EntityManagerInterface$entityManager): JsonResponse
    {
        $data      = json_decode($request->getContent(),true);
        $homeTeam  = $data['homeTeam'];
        $awayTeam  = $data['awayTeam'];
        $startDate = new DateTime($data['startDate']);
        $endDate   = $startDate->modify('+2 hours');

        if(empty($homeTeam) || empty($awayTeam) || empty($startDate) || empty($endDate)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Error ',
            ]);
        }

        $match = new Game();
        $match
            ->setHomeTeam($homeTeam)
            ->setAwayTeam($awayTeam)
            ->setStartTime($startDate)
            ->setEndTime($endDate)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());

        $entityManager->persist($match);
        $entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Match registered succesfully'
        ]);
    }


}
