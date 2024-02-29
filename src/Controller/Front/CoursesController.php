<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function index(): Response
    {
        return $this->render('front/courses/index.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }
}
