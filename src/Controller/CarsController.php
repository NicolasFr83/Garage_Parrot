<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Form\CarsType;
use App\Entity\FormContact;
use App\Form\FormContactType;
use App\Repository\CarsRepository;
use App\Repository\CarsPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FormContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/cars')]
class CarsController extends AbstractController
{
    #[Route('/', name: 'app_cars_index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        CarsRepository $carsRepository,
        CarsPageRepository $carPageRepository,
        FormContactRepository $formContactRepository,
        PaginatorInterface $paginatorInterface,
    ): Response
    {
        $minYear = $request->get('year');
        $maxKms = $request->get('kms_max');
        $maxPrice = $request->get('price_max');

        $cars = $carsRepository->getFilteredCars($minYear, $maxPrice, $maxKms);
        $paginatedCars = $paginatorInterface->paginate(
            $cars,
            $request->query->getInt('page', 1),
            5
        );

        if ($request->get('ajax')) {
            if (!$cars) {
                // Si aucune voiture n'est trouvée
                return new JsonResponse([
                    'content' => $this->renderView('cars/_no_cars_found.html.twig'),
                    'debug' => $minYear,
                    'maxPrice' => $maxPrice,
                    'maxKms' => $maxKms,
                    'paginatedCars' => $paginatedCars
                ]);
            } else {
                // Si des voitures sont trouvées
                return new JsonResponse([
                    'content' => $this->renderView('cars/_cars.html.twig', [
                        'cars' => $cars,
                    ]),
                ]);
            }
        }

        return $this->render('cars/index.html.twig', [
            'cars_pages' => $carPageRepository->findAll(),
            'cars' => $cars,
            'paginatedCars' => $paginatedCars,
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

    #[Route('/{id}', name: 'app_cars_show', methods: ['GET', 'POST'])]
    public function show(Cars $car, FormContactRepository $formContactRepository, Request $request): Response
    {
        $formContact = new FormContact();

        $carId = $car->getId();
        $carBrand = $car->getBrand();

        $subject = 'Informations concernant la voiture n° ' . $carId . ' de la marque ' . $carBrand;
        $formContact->setSubject($subject);

        $form = $this->createForm(FormContactType::class, $formContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formContactRepository->save($formContact, true);

            $this->addFlash('messageFormContactSentFromCars', 'Le formulaire de contact a bien été envoyé.');
            return $this->redirectToRoute('app_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cars/show.html.twig', [
            'car' => $car,
            'form_contact_contain' => $formContact,
            'form' => $form,
            'formContact' => $form->createView(),
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