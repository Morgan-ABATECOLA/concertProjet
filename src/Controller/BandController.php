<?php

namespace App\Controller;

use App\Repository\BandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{
    /**
     * @Route("/band/display/{id}", name="band")
     */
    public function displayBandById(int $id, BandRepository $bandRepo): Response
    {
        if ($bandRepo->find($id) != null) {
            $result = $bandRepo->find($id);
            return $this->render('band/index.html.twig', [
                'isNull' => false,
                'theBand' => $result,
                'controller_name' => 'BandController',
            ]);
        } else {
            return $this->render('band/index.html.twig', [
                'isNull' => true,
                'controller_name' => 'BandController',
                ]);
        }
    }
    
    /**
     * @Route("/bands", name="bands")
     */
    public function displayAllBands(BandRepository $bandRepo): Response
    {
        if ($bandRepo->findAll() != null) {
            $result = $bandRepo->findAll();
            return $this->render('band/bands.html.twig', [
                'isNull' => false,
                'theBand' => $result,
                'controller_name' => 'BandController',
            ]);
        } else {
            return $this->render('band/index.html.twig', [
                'isNull' => true,
                'controller_name' => 'BandController',
            ]);
        }
    }
}
