<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Path;

class DisplayController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('front/display/homepage.html.twig');
    }

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('front/display/presentation.html.twig');
    }

    #[Route('/actions', name: 'app_actions')]
    public function actions(): Response
    {
        $photos = ['1', '2', '4', '5', '6', '7', '8', '10'];

        return $this->render('front/display/actions.html.twig', [
            'photos' => $photos,
        ]);
    }

    #[Route('/evenements', name: 'app_events')]
    public function events(): Response
    {
        return $this->render('front/display/events.html.twig');
    }

    #[Route('/partenaires', name: 'app_partners')]
    public function partners(): Response
    {
        return $this->render('front/display/partners.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('front/display/contact.html.twig');
    }
}
