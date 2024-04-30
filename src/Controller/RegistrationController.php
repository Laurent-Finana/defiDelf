<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\UserAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UserAuthenticator $authenticator, MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email
            $mail = (new TemplatedEmail())
                ->to('contact@defidelf.org')
                ->from($user->getEmail())
                ->subject('Demande d\'inscription aux cours de français')
                ->htmlTemplate('emails/course.html.twig')
                ->context(['user' => $user]);

            $mailer->send($mail);
            $this->addFlash('success', 'Inscription réussie, l\'administrateur doit vous donner les droits pour accéder aux cours.');
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );

        } elseif($form->isSubmitted()) {
            $this->addFlash('danger', 'Impossible d\'envoyer votre demande, veuillez vérifier les informations fournies dans le formulaire');
        }
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));

    }
}
