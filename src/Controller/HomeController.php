<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ContactType;
use App\Form\ReservationType;
use App\Repository\PerformancesRepository;
use App\Repository\ReservationRepository;
use App\Repository\SpectacleRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ReservationRepository $reservationRepository,ObjectManager $manager, Request $request,PerformancesRepository $performancesRepository, SpectacleRepository $spectacleRepository)
    {
        $form = $this->createForm(ReservationType::class);
        $form->handleRequest($request);
        $b='test';
        $price=0;
        if ($request->isMethod('POST')) {
            if ($form->isSubmitted() && $form->isValid()) {
                $a=$form->getData();
                $b=$spectacleRepository->findBy(array('id'=> $a["spectacle"]));
                if($a["group"]=== true && !empty($a["nbgroup"]) && $b[0]->getPlace()>0){
                    $price+= 9*$a["nbgroup"];
                    $count= $a["nbgroup"];
                }
                if($a["ecole"]=== true && !empty($a["nbecole"])&& $b[0]->getPlace()>0){
                    $price+= 8*$a["nbecole"];
                    $count= $a["nbecole"];
                }
                if($a["adulte"]=== true && !empty($a["nbadulte"])&& $b[0]->getPlace()>0){
                    $price+= 12*$a["nbadulte"];
                    $count= $a["nbadulte"];
                }
                if($a["enfant"]=== true && !empty($a["nbenfant"])&& $b[0]->getPlace()>0){
                    $price+= 10*$a["nbenfant"];
                    $count= $a["nbenfant"];
                }
                foreach ($b as $value){
                    $c=$value->getPlace();
                    $total=$c-$count;
                    if($total>0) {
                        $value->setPlace($c - $count);
                        $manager->persist($value);
                        $manager->flush();
                    }
                }
                if($total>0) {
                    $n = $reservationRepository->findBy(array('UserId' => $this->getUser()->getId()));
                    if (!empty($n)) {
                        foreach ($n as $value) {
                            $value->setArchive(0);
                            $manager->persist($value);
                            $manager->flush();
                        }
                    }
                    $c = new Reservation();
                    $c->setUserId($this->getUser()->getId());
                    $c->setSpectacleId($a["spectacle"]);
                    $c->setPrice($price);
                    $c->setNbpersonne($count);
                    $c->setArchive(1);
                    $manager->persist($c);
                    $manager->flush();
                } else {
                    $this->addFlash('success', 'Pas assez de place disponible');
                    return $this->redirectToRoute('home');
                }
            }
        }
        return $this->render('home/index.html.twig', [
            'performances' => $performancesRepository->findAll(),
            'spectacles' => $spectacleRepository->findAll(),
            'a' =>$b,
            'form' => $form->createView(),
            'form1' => $form->createView(),
            'form2' => $form->createView(),
            'form3' => $form->createView(),
        ]);
    }
}
