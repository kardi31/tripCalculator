<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\TripRepository;
use App\Service\TripCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class CalculatorController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage", methods={"GET"})
     *
     * @param TripRepository $tripRepository
     * @param TripCalculator $calculator
     *
     * @return Response
     */
    public function indexAction(TripRepository $tripRepository, TripCalculator $calculator)
    {
        $tripList = $tripRepository->findAll();

        $trips = $calculator->calculateTripMeasures($tripList);

        return $this->render('calculator/index.html.twig', [
            'trips' => $trips
        ]);
    }
}
