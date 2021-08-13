<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function FunctionName(): Response
    {
        return $this->render('backoffice/admin/index.html.twig', [
            'current'=>'acceuil',
        ]);
    }
}
