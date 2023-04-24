<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\Encrypt;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/ajax/registration', name: 'app_registration')]
    public function index(Request $request, EntityManagerInterface $entityManager, Encrypt $encrypt): JsonResponse
    {
        $data     = json_decode($request->getContent(),true);
        $name     = $data['name'];
        $surname  = $data['surname'];
        $email    = $data['email'];
        $password = $data['password'];

        $user = new User();
        $user
            ->setName($name)
            ->setSurname($surname)
            ->setEmail($email)
            ->setPassword($encrypt->encryptPassword($password))
            ->setUpdatedAt(new \DateTimeImmutable())
            ->setCreatedAt(new \DateTimeImmutable());

        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'User registered successfully',
        ]);
    }
}
