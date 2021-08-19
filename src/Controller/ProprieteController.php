<?php

namespace App\Controller;

use App\Entity\Propriete;
use App\Entity\ProprieteSearch;
use App\Form\ProprieteSearchType;
use App\Repository\ProprieteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;

class ProprieteController extends AbstractController
{
    /**
     * @Route("/propriete", name="propriete")
     */
    public function index(ProprieteRepository $proprieteRepository,
     Request $request,
     PaginatorInterface $pagination
     ): Response
    {
        $ProprieteSearch= new ProprieteSearch();

        $form = $this->createForm(ProprieteSearchType::class, $ProprieteSearch);
        $form->handleRequest($request);
        $search= $form->getData();

        $ProprieteSearch = $proprieteRepository->recherche($search);

        $proprietes = $pagination->paginate(
            $ProprieteSearch,
            $request->query->getInt('page',1), 
            12
        );

        return $this->render('vitrine/propriete/propriete.html.twig', [
            'current' => 'propriete',
            'proprietes' => $proprietes,
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
