<?php

namespace App\Controller;

use App\Entity\Propriete;
use App\Entity\ProprieteSearch;
use App\Form\ProprieteSearchType;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;

class ProprieteController extends AbstractController
{
    /**
     * @Route("/propriete", name="propriete")
     */
    public function index(ProprieteRepository $proprieteRepository, Request $request): Response
    {
        $ProprieteSearch= new ProprieteSearch();
        $form = $this->createForm(ProprieteSearchType::class, $ProprieteSearch);
        $form->handleRequest($request);
        $search= $form->getData();

        return $this->render('vitrine/propriete/propriete.html.twig', [
            'current' => 'propriete',
            'proprietes' => $proprieteRepository->All($search),
            'form' => $form->createView(),
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
