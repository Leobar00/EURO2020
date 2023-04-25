<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Encrypt;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/ajax/login', name: 'app_login',methods: "POST")]
    public function index(Request $request,UserRepository $userRepository): JsonResponse
    {
        $data     = json_decode($request->getContent(),true);
        $email    = $data['email'];
        $password = $data['password'];

        $user = $userRepository->findByEmail($email);

        if ($user && password_verify($password, $user->getPassword())) {
            return new JsonResponse([
                'success' => true,
                'message' => 'User found',
                'username'=> $user->getName()
            ]);
        }

        if($user) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Wrong Password',
            ]);
        }

        return new JsonResponse([
            'success' => false,
            'message' => 'User not found',
        ]);

    }
}
