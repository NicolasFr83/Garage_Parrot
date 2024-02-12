<?php

namespace App\Controller;

use App\Entity\ContactPage;
use App\Form\ContactPageType;
use App\Repository\ContactPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact/page')]
class ContactPageController extends AbstractController
{
    #[Route('/', name: 'app_contact_page_index', methods: ['GET'])]
    public function index(ContactPageRepository $contactPageRepository): Response
    {
        return $this->render('contact_page/index.html.twig', [
            'contact_pages' => $contactPageRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contact_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactPage $contactPage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactPageType::class, $contactPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_page/edit.html.twig', [
            'contact_page' => $contactPage,
            'form' => $form,
        ]);
    }
}
