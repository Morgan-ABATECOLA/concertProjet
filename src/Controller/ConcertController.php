<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Form\ConcertType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concert", name="concert")
     */
    public function index(): Response
    {
        return $this->render('concert/index.html.twig', [
            'controller_name' => 'ConcertController',
        ]);
    }

    /**
     * @Route("/concert/create", name="concert_create")
     */
    public function createConcert(Request $request): Response
    {
        $concert = new Concert();

        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $concert = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concert);
            $entityManager->flush();

            return $this->redirectToRoute('concert_success');
        }

        return $this->render('concert/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
