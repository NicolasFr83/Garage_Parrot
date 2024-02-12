<?php

namespace App\Controller;

use App\Entity\OpinionPage;
use App\Form\OpinionPageType;
use App\Repository\OpinionPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/opinion/page')]
class OpinionPageController extends AbstractController
{
    #[Route('/', name: 'app_opinion_page_index', methods: ['GET'])]
    public function index(OpinionPageRepository $opinionPageRepository): Response
    {
        return $this->render('opinion_page/index.html.twig', [
            'opinion_pages' => $opinionPageRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_opinion_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OpinionPage $opinionPage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OpinionPageType::class, $opinionPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_opinion_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('opinion_page/edit.html.twig', [
            'opinion_page' => $opinionPage,
            'form' => $form,
        ]);
    }
}
