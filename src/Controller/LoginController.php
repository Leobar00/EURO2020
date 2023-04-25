<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Encrypt;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/ajax/login', name: 'app_login',methods: "POST")]
    public function index(Request $request,UserRepository $userRepository,SessionInterface $session): JsonResponse
    {
        $data     = json_decode($request->getContent(),true);
        $email    = $data['email'];
        $password = $data['password'];

        $user = $userRepository->findByEmail($email);

        if(empty($user)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Wrong Password',
            ]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return new JsonResponse([
                'success' => false,
                'message' => 'User not found',
            ]);
        }

        $session->set('session',[
            "name" => $user->getName(),
            "admin"=> $user->isAdministrator()
        ]);

        return new JsonResponse([
            'success' => true,
            'message' => 'User found',
            'username'=> $user->getName(),
            'isAdmin' => $user->isAdministrator()
        ]);
    }

    #[Route('/ajax/session', name: 'app_session',methods: "GET")]
    public function sessionCheck(SessionInterface $session): JsonResponse
    {
        $user = $session->get('session');

        if(empty($user)) {
            return new JsonResponse([
                'success' => true,
                'message' => 'User not found',
            ]);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'User found',
            'user'    => $user['name'],
            'isAdmin' => $user['admin']
        ]);
    }

    #[Route('/ajax/quit', name: 'app_quit',methods: "GET")]
    public function clearSession(SessionInterface $session): JsonResponse
    {
        $session->clear();

        return new JsonResponse([
            'success' => true,
            'message' => 'Esc',
        ]);
    }


}
