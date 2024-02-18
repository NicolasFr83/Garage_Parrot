<?php

namespace App\Controller;

use App\Entity\Opinions;
use App\Form\OpinionsType;
use App\Repository\GarageRepository;
use App\Repository\OpinionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/opinions')]
class OpinionsController extends AbstractController
{
    #[Route('/', name: 'app_opinions_index', methods: ['GET'])]
    public function index(OpinionsRepository $opinionsRepository): Response
    {
        $moderatedOpinions = $opinionsRepository->findBy(['isModerated' => true]);

        return $this->render('opinions/index.html.twig', [
            'moderatedOpinions' => $moderatedOpinions,
        ]);
    }

    #[Route('/new', name: 'app_opinions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, GarageRepository $garageRepository): Response
    {        
        $opinion = new Opinions();

        $garageName = 'Garage Parrot';
        $garage = $garageRepository->findOneBy(['name' => $garageName]);

        if ($garage) {
            $opinion->setGarage($garage);
        }

        $opinion->setIsModerated(false);
        
        $form = $this->createForm(OpinionsType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($opinion);
            $entityManager->flush();

            $this->addFlash('messageOpinionSent', 'Votre avis a bien été envoyé.');
            return $this->redirectToRoute('app_home_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('opinions/new.html.twig', [
            'opinion' => $opinion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_opinions_show', methods: ['GET'])]
    public function show(Opinions $opinion): Response
    {
        return $this->render('opinions/show.html.twig', [
            'opinion' => $opinion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_opinions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Opinions $opinion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OpinionsType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_opinions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('opinions/edit.html.twig', [
            'opinion' => $opinion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_opinions_delete', methods: ['POST'])]
    public function delete(Request $request, Opinions $opinion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opinion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($opinion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_opinions_index', [], Response::HTTP_SEE_OTHER);
    }
}
