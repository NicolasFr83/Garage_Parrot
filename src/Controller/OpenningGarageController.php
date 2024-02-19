<?php

namespace App\Controller;

use App\Repository\OpenningGarageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenningGarageController extends AbstractController
{
    #[Route('/openning/garage', name: 'app_openning_garage', methods: ['GET'])]
    public function index(OpenningGarageRepository $openningGarageRepository): Response
    {
        $openningHours = $openningGarageRepository->findOneBy(['openingday' => 'Lundi']);
        $openningHourMorning = $openningHours->getOpeninghourmorning();
        $closingHourMorning = $openningHours->getClosinghourmorning();
        $openningHourAfternoon = $openningHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openningHours->getClosinghourafternoon();

        return $this->render('openning_garage/index.html.twig', [
            'controller_name' => 'OpenningGarageController',
            'openningGarages' => $openningGarageRepository->findAll(),
            'openningHourMorning' => $openningHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openningHourAfternoon' => $openningHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }
}