<?php

namespace App\Controller;

use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function contact(Request $request, EntityManagerInterface $entityManager, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($request->isMethod('POST')) {
            if ($form->isSubmitted() && $form->isValid()) {
                $a=$form->getData();
                $this->addFlash('success', 'Votre message a été envoyé');
            }
        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }
}
