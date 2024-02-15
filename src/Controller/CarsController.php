<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Form\CarsType;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarsPageRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/cars')]
class CarsController extends AbstractController
{
    #[Route('/', name: 'app_cars_index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        CarsRepository $carsRepository,
        CarsPageRepository $carPageRepository,

    ): Response
    {
        $minYear = $request->get('year');
        $maxKms = $request->get('kms_max');
        $maxPrice = $request->get('price_max');

        $cars = $carsRepository->getFilteredCars($minYear, $maxPrice, $maxKms);

        if ($request->get('ajax')) {
            if (!$cars) {
                // Si aucune voiture n'est trouvée
                return new JsonResponse([
                    'content' => $this->renderView('cars/_no_cars_found.html.twig'),
                    'debug' => $minYear,
                    'maxPrice' => $maxPrice,
                    'maxKms' => $maxKms,
                ]);
            } else {
                // Si des voitures sont trouvées
                return new JsonResponse([
                    'content' => $this->renderView('cars/_cars.html.twig', [
                        // Vous pouvez également passer des données à la vue ici si nécessaire
                        'cars' => $cars,
                    ]),
                ]);
            }
        }

        return $this->render('cars/index.html.twig', [
            'cars_pages' => $carPageRepository->findAll(),
            'cars' => $cars,
        ]);
    }

    #[Route('/new', name: 'app_cars_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $car = new Cars();
        $form = $this->createForm(CarsType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('app_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cars/new.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cars_show', methods: ['GET'])]
    public function show(Cars $car): Response
    {
        return $this->render('cars/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cars_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cars $car, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarsType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cars/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cars_delete', methods: ['POST'])]
    public function delete(Request $request, Cars $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cars_index', [], Response::HTTP_SEE_OTHER);
    }
}
