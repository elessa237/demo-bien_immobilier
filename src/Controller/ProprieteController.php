<?php

namespace App\Controller;

use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprieteController extends AbstractController
{
    /**
     * @Route("/propriete", name="propriete")
     */
    public function index(ProprieteRepository $proprieteRepository): Response
    {
        return $this->render('vitrine/propriete/propriete.html.twig', [
            'current'=>'propriete',
            'proprietes'=>$proprieteRepository->All(),
        ]);
    }
}
