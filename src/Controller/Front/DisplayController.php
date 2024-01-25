<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('front/display/homepage.html.twig');
    }

    #[Route('/actions', name: 'app_actions')]
    public function actions(): Response
    {
        return $this->render('front/display/actions.html.twig');
    }

    #[Route('/evenements', name: 'app_events')]
    public function events(): Response
    {
        $photos = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];

        return $this->render('front/display/events.html.twig', [
            'photos' => $photos,
        ]);
    }
}
