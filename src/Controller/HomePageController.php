<?php

namespace App\Controller;

use App\Repository\ConcertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ConcertRepository $concertRepo): Response
    {
        if ($concertRepo->findAll() != null) {
            $result = $concertRepo->findAll();
            return $this->render('home-page/index.html.twig', [
                'isNull' => false,
                'theConcert' => $result,
                'controller_name' => 'ConcertController',
            ]);
        } else {
            return $this->render('home-page/index.html.twig', [
                'isNull' => true,
                'controller_name' => 'ConcertController',
            ]);
        }
    }


}
