<?php

namespace App\Controller\vitrine;

use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProprieteRepository $proprieteRepository): Response
    {

        return $this->render('vitrine/home/index.html.twig', [
            'current'=>'home',
            'proprietes'=>$proprieteRepository->Last(),
        ]);
    }
}
