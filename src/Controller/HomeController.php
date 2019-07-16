<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\PerformancesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PerformancesRepository $performancesRepository)
    {
        return $this->render('home/index.html.twig', [
            'performances' => $performancesRepository->findAll(),
        ]);
    }
}
