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
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

#[Route('/admin/planning')]
class PlanningController extends AbstractController
{
    #[Route('/', name: 'app_admin_planning_index')]
    public function index(PlanningRepository $planning): Response
    {
        $plannings = $planning->findAll();
        return $this->render('admin/planning/index.html.twig', [
            'plannings' => $plannings,
        ]);
    }

    #[Route('/nouveau', name: 'app_admin_planning_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $planning = new Planning();
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($planning);
            $em->flush();

            return $this->redirectToRoute('app_admin_planning_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/planning/new.html.twig', [
            'planning' => $planning,
            'form' => $form,
         ]);
    }

    #[Route('/{id}', name: 'app_admin_planning_show', methods: ['GET'])]
    public function show(Planning $planning): Response
    {
        return $this->render('admin/planning/show.html.twig', [
            'planning' => $planning,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_planning_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Planning $planning, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_admin_planning_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/planning/edit.html.twig', [
            'planning' => $planning,
            'form' => $form
        ]);
    }

    #[Route('/{id}', name: 'app_admin_planning_delete', methods: ['POST'])]
    public function delete(Request $request, Planning $planning, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planning->getId(), $request->request->get('_token'))) {
            $entityManager->remove($planning);
            $entityManager->flush();
        }                 

        return $this->redirectToRoute('app_admin_planning_index', [], Response::HTTP_SEE_OTHER);
    }
}
