<?php

namespace App\Controller;

use App\Entity\CarsPage;
use App\Form\CarsPageType;
use App\Repository\CarsPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cars/page')]
class CarsPageController extends AbstractController
{
    #[Route('/', name: 'app_cars_page_index', methods: ['GET'])]
    public function index(CarsPageRepository $carsPageRepository): Response
    {
        return $this->render('cars_page/index.html.twig', [
            'cars_pages' => $carsPageRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cars_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CarsPage $carsPage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarsPageType::class, $carsPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cars_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cars_page/edit.html.twig', [
            'cars_page' => $carsPage,
            'form' => $form,
        ]);
    }
}
