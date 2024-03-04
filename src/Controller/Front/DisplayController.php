<?php

namespace App\Controller\Front;

use App\Entity\Article;
use App\Repository\ArticleRepository;
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

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('front/display/presentation.html.twig');
    }

    #[Route('/actions', name: 'app_actions')]
    public function actions(): Response
    {
        $cards = [
            [
                'photo' => '1',
                'title' => 'Ateliers en soirée',
                'content' => 'Permettre aux apprenants allophones de pouvoir apprendre le
                français en groupe, à des horaires adoptés à leurs emplois du
                temps.'
            ],
            [
                'photo' => '2',
                'title' => 'Acteur de son apprentissage',
                'content' => 'Proposer des activités interactives qui encouragent les
                apprenants à participer activement, à collaborer et à échanger.'
            ],
            [
                'photo' => '3',
                'title' => 'Variété de supports et de médias',
                'content' => 'Utiliser l\'audio, la vidéo, les jeux de rôle, les activités en ligne,
                etc., pour répondre aux différents styles d\'apprentissage.'
            ],
            [
                'photo' => '4',
                'title' => 'Communiquer, chercher ensemble',
                'content' => 'La pratique régulière de la langue française est essentielle pour
                améliorer ses compétences orales.'
            ],
            [
                'photo' => '5',
                'title' => 'Argumenter et réfléchir ensemble',
                'content' => 'L\'apprentissage d\'une langue n\'est pas déconnecté des réalités
                quotidiennes, ainsi les apprenants, en tant qu\'acteurs sociaux,
                sont invités à donner, échanger leur point de vue sur des sujets
                d\'actualité (environnement, transports etc...).'
            ],
            [
                'photo' => '6',
                'title' => 'Favoriser les interactions verbales',
                'content' => 'Amener les apprenants à communiquer par des situations de
                jeu, de saynètes, de dialogues simulés permet d\'accéder à une
                communication effective et authentique, transposable dans des
                situations réelles de la vie quotidienne.'
            ],
            [
                'photo' => '7',
                'title' => 'Visite de la médiathèque Jacques Chirac',
                'content' => 'En visitant cet espace de découvertes et de rencontres, chacun
                s\'approprie le paysage culturel, construit, petit à petit, une
                sécurité, une légitimité culturelle et linguistique.'
            ],
            [
                'photo' => '8',
                'title' => 'Immersion culturelle française',
                'content' => 'En visitant la médiathèque de Troyes, les apprenants découvrent
                des œuvres littéraires, des films, de la musique, des expositions.'
            ],
            [
                'photo' => '9',
                'title' => 'Favoriser l’autonomie',
                'content' => 'De nombreux matériaux pédagogiques spécifiquement conçus
                pour l\'apprentissage du français langue étrangère. Des
                ressources en ligne peuvent être utiles aux apprenants de tous
                niveaux.'
            ],
            [
                'photo' => '10',
                'title' => 'Ecouter et chanter ensemble des chansons françaises',
                'content' => 'Travailler sur la prononciation, la phonétique, l’articulation en
                imitant les chanteurs natifs.
                Les paroles des chansons françaises reflètent souvent des
                aspects de la culture, de l\'histoire et de la société françaises.'
            ],
            [
                'photo' => '11',
                'title' => 'Partenariat avec Troyes Chante',
                'content' => 'Assister et découvrir des spectacles de chansons françaises : une
                belle immersion festive et culturelle.
                La vie de groupe est si importante dans un processus
                d’apprentissage.'
            ],
            [
                'photo' => '12',
                'title' => 'Interagir avec des locuteurs natifs français',
                'content' => 'Mieux comprendre leur culture, leurs valeurs et leurs points de
                vue. Les échanges linguistiques et les conversations avec des
                francophones enrichissent l’apprentissage'
            ],
            [
                'photo' => '13',
                'title' => 'Communiquer en ligne',
                'content' => 'Rédiger des courriels, participer à des forums de discussion en
                ligne, créer des présentations multimédias, etc., permettent aux
                apprenants de développer leurs compétences de communication
                en français dans des contextes authentiques.'
            ],
            [
                'photo' => '14',
                'title' => 'Effectuer des démarches en ligne',
                'content' => 'Se familiariser avec les sites web gouvernementaux et les
                services qu\'ils offrent.'
            ],
            [
                'photo' => '15',
                'title' => 'Variété des ressources en ligne',
                'content' => 'Individualiser l’apprentissage en offrant des activités variées et
                engageantes d\'apprentissage du français.'
            ],
            [
                'photo' => '16',
                'title' => 'S’évaluer pour mieux connaître son niveau',
                'content' => 'Les sessions d’entraînement au DELF – Diplôme d’études en
                Langue Française, agrées par France Education Internationale
                permettent de mieux connaître son niveau avant de s’inscrire
                aux examens officiels.'
            ],
            [
                'photo' => '17',
                'title' => 'Se tester en situations réelles d’examen',
                'content' => 'Apprendre à lire attentivement les consignes et gérer son temps
                et son stress entre les différentes parties de l\'examen.'
            ],
            [
                'photo' => '18',
                'title' => 'Réaliser des examens blancs',
                'content' => 'Se mettre dans des conditions similaires à celles de l\'examen réel
                pour réfléchir aux attentes des épreuves et se familiariser au
                format des épreuves.'
            ],
            
        ];

        return $this->render('front/display/actions.html.twig', [
            'cards' => $cards
        ]);
    }

    #[Route('/actualites', name: 'app_news')]
    public function news(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

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
