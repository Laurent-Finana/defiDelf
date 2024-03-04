<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_PROF')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_admin_home')]
    public function index(): Response
    {
        return $this->render('admin/home/index.html.twig');
    }
}
