<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;

// for hashing password
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

// import User entity & form
use App\Entity\User;
use App\Form\SignupType;

class SecurityController extends AbstractController
{
    #[Route('/signup', name: 'app_user_signup', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hashpwd): Response
    {
        $user = new User();
        $form = $this->createForm(SignupType::class, $user);
        $form->handleRequest($request);

        // when form is submitted & valid, store in DB as new User with hashed password
        if ($form->isSubmitted() && $form->isValid()) {
            // hash password before putting in DB
            $user->setPassword($hashpwd->hashPassword($user, $form->get('password')->getData()));
            // set role as public user (ROLE_USER)
            $user->setRoles(["ROLE_USER"]);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('security/signup.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
