<?php

namespace App\Controller\Admin;

use App\Entity\Options;
use App\Form\OptionsType;
use App\Repository\OptionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/options")
 */
class AdminOptionsController extends AbstractController
{
    /**
     * @Route("/", name="admin_options_index", methods={"GET"})
     */
    public function index(OptionsRepository $optionsRepository): Response
    {
        return $this->render('backoffice/options/index.html.twig', [
            'options' => $optionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_options_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $option = new Options();
        $form = $this->createForm(OptionsType::class, $option);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($option);
            $entityManager->flush();

            return $this->redirectToRoute('admin_options_index');
        }

        return $this->renderForm('backoffice/options/new.html.twig', [
            'option' => $option,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_options_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Options $option): Response
    {
        $form = $this->createForm(OptionsType::class, $option);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_options_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/options/edit.html.twig', [
            'option' => $option,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_options_delete", methods={"POST"})
     */
    public function delete(Request $request, Options $option): Response
    {
        if ($this->isCsrfTokenValid('delete'.$option->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($option);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_options_index', [], Response::HTTP_SEE_OTHER);
    }
}
