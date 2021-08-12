<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprieteController extends AbstractController
{
    /**
     * @Route("/propriete", name="propriete")
     */
    public function index(): Response
    {
        return $this->render('vitrine/propriete/propriete.html.twig', [
            'current'=>'propriete',
        ]);
    }
}
