<?php

namespace App\Controller\Admin;

use App\Repository\ProprieteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(
        ProprieteRepository $proprieteRepository,
        UserRepository $userRepository
    ): Response {
        return $this->render('backoffice/admin/index.html.twig', [
            'current' => 'acceuil',
            'proprietes' => $proprieteRepository->All(),
            'users' => $userRepository->findAll(),
            'proprieteVendu'=>$proprieteRepository->Vendu(),
        ]);
    }
}
