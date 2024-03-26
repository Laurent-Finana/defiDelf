<?php

namespace App\Controller;

use App\DTO\ProductionDTO;
use App\Form\ProductionType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/cours', name: 'app_courses_')]
#[IsGranted('ROLE_APPRENANT')]
class ProductionController extends AbstractController
{
    #[Route('/production', name: 'production')]
    public function production(Request $request, MailerInterface $mailer): Response
    {
        $data = new ProductionDTO();
        $form = $this->createForm(ProductionType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            try {
                $mail = (new TemplatedEmail())
                    ->to('production@defidelf.org')
                    ->from($data->email)
                    ->subject('Nouvelle production écrite')
                    ->htmlTemplate('emails/production.html.twig')
                    ->context(['data' => $data]);

                $mailer->send($mail);
                $this->addFlash('success', 'Votre email a bien été envoyé');
                return $this->redirectToRoute('app_courses_production_ecrite');
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Impossible d\'envoyer votre email');
            }
        }

        return $this->render('production/production.html.twig', [
            'form' => $form,
        ]);
    }
}
