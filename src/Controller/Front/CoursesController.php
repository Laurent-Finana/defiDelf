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

    #[Route('/comprehension-orale', name: 'comprehension_orale')]
    public function oralComp(CourseRepository $course)
    {
        $courses = $course->findByCategory(1);
        return $this->render('front/display/courses/oralComp.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/comprehension-ecrite', name:'comprehension_ecrite')]
    public function writtenComp(CourseRepository $course)
    {
        $courses = $course->findByCategory(2);
        return $this->render('front/display/courses/writtenComp.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/production-orale', name:'production_orale')]
    public function oralProd(CourseRepository $course)
    {
        $courses = $course->findByCategory(3);
        return $this->render('front/display/courses/oralProd.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/production-ecrite', name:'production_ecrite')]
    public function writtenProd(CourseRepository $course)
    {
        $courses = $course->findByCategory(4);
        return $this->render('front/display/courses/writtenProd.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/phonetique', name:'phonetique')]
    public function phonetic(CourseRepository $course)
    {
        $courses = $course->findByCategory(5);
        return $this->render('front/display/courses/phonetic.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/a-retenir', name:'a_retenir')]
    public function toRemember(CourseRepository $course)
    {
        $courses = $course->findByCategory(6);
        return $this->render('front/display/courses/toRemember.html.twig', [
            'courses' => $courses
        ]);
    }
}
