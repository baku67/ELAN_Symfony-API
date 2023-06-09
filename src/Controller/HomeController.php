<?php

namespace App\Controller;


use App\HttpClient\BGAHttpClient;
// use App\Factory\XmlResponseFactory;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
    * @Route("/game", name="app_game", methods={"POST"})
    */
    public function displayGame(BGAHttpClient $bga, Request $request) {
        $gameId = $request->request->get('gameId');
        return new Response($bga->getGame($gameId));
    }

    /**
    * @Route("/games", name="app_games", methods={"POST"})
    */
    public function gamesList(BGAHttpClient $bga, Request $request) {
        $searchValue = $request->request->get('searchValue');
        return new Response($bga->getGames($searchValue));
    }
}
