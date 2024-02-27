<?php

namespace App\Controller;

use App\DTO\PracticeDTO;
use App\Form\PracticeType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class PracticeController extends AbstractController
{
    #[Route('/entrainement-delf-inscriptiopn', name: 'app_practice')]
    public function practice(Request $request, MailerInterface $mailer): Response
    {
        $data = new PracticeDTO();

        $form = $this->createForm(PracticeType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            try {
                $mail = (new TemplatedEmail())
                    ->to('contact@defidelf.org')
                    ->from($data->email)
                    ->subject('Demande d\'inscription aux sessions d\'entraînement')
                    ->htmlTemplate('emails/practice.html.twig')
                    ->context(['data' => $data]);

                $mailer->send($mail);
                $this->addFlash('success', 'Votre demande a bien été envoyée');
                return $this->redirectToRoute('app_practice', ['_fragment'=>'practiceForm']);
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Impossible d\'envoyer votre demande');
            
            }
        }

        return $this->render('practice/practice.html.twig', [
            'form' => $form,
        ]);
    }
}
