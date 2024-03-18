<?php

namespace App\Controller\Front;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('front/display/homepage.html.twig');
    }

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(ArticleRepository $article): Response
    {
        $articles = $article->findByPress(true);

        return $this->render('front/display/presentation.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/actions', name: 'app_actions')]
    public function actions(ArticleRepository $article): Response
    {
        $articles = $article->findByAction(true);
        return $this->render('front/display/actions.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/actualites', name: 'app_news')]
    public function news(ArticleRepository $articleRepository, Request $request): Response
    {
        $page = $request->query->getInt('page', 1);
        $articles = $articleRepository->paginateArticlesByActuality($page, true);
        return $this->render('front/display/news.html.twig', [
            "articles" => $articles
        ]);
    }

    #[Route('/article/{id}', name: 'app_news_show', methods: ['GET'])]
    public function newsShow(Article $article): Response
    {
        return $this->render('front/display/news_show.html.twig', [
            "article" => $article
        ]);
    }

    #[Route('/partenaires', name: 'app_partners')]
    public function partners(): Response
    {
        return $this->render('front/display/partners.html.twig');
    }
    
}
