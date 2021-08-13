<?php

namespace App\Controller;

use App\Entity\Propriete;
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
            'current' => 'propriete',
            'proprietes' => $proprieteRepository->All(),
        ]);
    }

    /**
     * @Route("/propriete/{slug}-{id}", name="propriete_show")
     */
    public function show(Propriete $propriete): Response
    {
        return $this->render('vitrine/propriete/show.html.twig', [
            'propriete' => $propriete,
        ]);
    }
}
