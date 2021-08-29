<?php

namespace App\Controller\Admin;

use App\Repository\ProprieteRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(
        ProprieteRepository $proprieteRepository,
        UserRepository $userRepository,
        Request $request,
        PaginatorInterface $pagination
    ): Response {
        $proprietes = $pagination->paginate(
            $proprieteRepository->Vendu(),
            $request->query->getInt('page', 1),
            4
        );
        return $this->render('backoffice/admin/index.html.twig', [
            'current' => 'acceuil',
            'proprietes' => $proprieteRepository->All(),
            'users' => $userRepository->findAll(),
            'proprietesVendu'=>$proprietes,
            'proprietesList'=>$proprieteRepository->Vendu()
        ]);
    }
}
