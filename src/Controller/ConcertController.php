<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Form\ConcertType;
use App\Repository\ConcertRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
     * @Route("concert/display/{id}"), name="display_concert")
     */
    public function displayConcertById(int $id, ConcertRepository $concertRepo):Response {
        $concert = $concertRepo->find($id);
        if ($concert != null) {
            return $this->render('concert/displayConcert.html.twig', [
                'isNull' => false,
                'c' => $concert,
                'controller_name' => 'ConcertController',
            ]);
        } else {
            return $this->render('concert/displayConcert.html.twig', [
                'isNull' => true,
                'controller_name' => 'ConcertController',
            ]);
        }
    }

    /**
     * @Route("/concert/list", name="concert_list")
     */
    public function concertList(ConcertRepository $concertRepo): Response
    {
        if ($concertRepo->findAll() != null) {
            $result = $concertRepo->findAll();
            return $this->render('concert/index.html.twig', [
                'isNull' => false,
                'theConcert' => $result,
                'controller_name' => 'ConcertController',
            ]);
        } else {
            return $this->render('concert/index.html.twig', [
                'isNull' => true,
                'controller_name' => 'ConcertController',
            ]);
        }
    }

    /**
     * @Route("/concert/create", name="concert_create")
     * @isGranted("ROLE_ADMIN", message="Vous n'avez pas accer a cette fonctionnalité")
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

    /**
     * @param Concert $concert
     *
     * @Route("concert/delete/{id}", name="concert_delete")
     * @isGranted("ROLE_ADMIN", message="Vous n'avez pas accer a cette fonctionnalité")
     */
    public function delete(Concert $concert, EntityManagerInterface $entityManager): Response {
        $entityManager->remove($concert);
        $entityManager->flush();

        return $this->redirectToRoute('concertList');
    }

    /**
     * @Route("concert/update/{id}", name="update_concert")
     * @isGranted("ROLE_ADMIN", message="Vous n'avez pas accer a cette fonctionnalité")
     */
    public function update(Request $request, Concert $concert, EntityManagerInterface $entityManager):Response {

        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $concert = $form->getData();

            $entityManager->persist($concert);
            $entityManager->flush();

            return $this->redirectToRoute('concert_success');
        }

        return $this->render('concert/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/concert/concert_success", name="concert_success")
     * @isGranted("ROLE_ADMIN", message="Vous n'avez pas accer a cette fonctionnalité")
     */
    public function successConcert(Request $request): Response
    {
        return $this->render('concert/new.html.twig', [
            'controller_name' => 'ConcertController',
        ]);
    }
}
