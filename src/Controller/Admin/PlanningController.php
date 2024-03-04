<?php

namespace App\Controller\Admin;

use App\Entity\Planning;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/planning')]
class PlanningController extends AbstractController
{
    #[Route('/', name: 'app_admin_planning')]
    public function index(PlanningRepository $planning): Response
    {
        $sessions = $planning->findAll();
        return $this->render('admin/planning/index.html.twig', [
            'sessions' => $sessions,
        ]);
    }

    #[Route('/nouveau', name: 'app_admin_planning_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $session = new Planning();
        $form = $this->createForm(PlanningType::class, $session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($session);
            $em->flush();

            return $this->redirectToRoute('app_admin_planning', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/planning/new.html.twig', [
            'session' => $session,
            'form' => $form,
        ]);
    }
}
