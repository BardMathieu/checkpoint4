<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use App\Repository\SpectacleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation/", name="reservation")
     */
    public function index(ReservationRepository $reservationRepository,SpectacleRepository $spectacleRepository)
    {
        $infolastspectacle=[];
        $reservation = $reservationRepository->findBy(array('UserId' => $this->getUser()->getId(),'archive' =>1));
        $lastreservation = $reservationRepository->findBy(array('UserId' => $this->getUser()->getId(),'archive' =>0));
        for($i=0;$i<count($lastreservation);$i++){
            $infolastspectacle[]=$spectacleRepository->find($lastreservation[$i]->getSpectacleId());
        }
        $infospectacle=$spectacleRepository->find($reservation[0]->getSpectacleId());

        return $this->render('reservation/index.html.twig', [
            'user' => $this->getUser(),
            'reservation' =>$reservation,
            'infospectacle' =>$infospectacle,
            'lastreservation' =>$lastreservation,
            'infolastspectacle' =>$infolastspectacle,
        ]);
    }
    /**
     * @Route("/reservationemail/", name="reservationemail")
     */
    public function sendEmail(){
        $this->addFlash('success', 'Votre message a été envoyé');
        return $this->redirectToRoute('reservation');
    }
}
