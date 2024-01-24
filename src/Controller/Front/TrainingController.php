<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    #[Route('/entraînement', name: 'app_displayTraining')]
    public function displayTraining(): Response
    {
        return $this->render('front/display/training.html.twig');
    }
}
