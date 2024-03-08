<?php

namespace App\Controller\Front;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/cours', name: 'app_courses_')]
#[IsGranted('ROLE_APPRENANT')]
class CoursesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CourseRepository $course): Response
    {
        $courses = $course->findAll();
        return $this->render('front/display/courses/index.html.twig', [
            'courses' => $courses
        ]);
    }
}
