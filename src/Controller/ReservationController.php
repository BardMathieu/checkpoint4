<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation/", name="reservation")
     */
    public function index(ReservationRepository $reservationRepository)
    {
        $reservation = $reservationRepository->findBy(array('UserId' => $this->getUser()->getId(),'archive' =>1));
        $user = $this->getUser();

        return $this->render('reservation/index.html.twig', [
            'user' => $this->getUser(),
            'reservation' =>$reservation,
        ]);
    }
}
