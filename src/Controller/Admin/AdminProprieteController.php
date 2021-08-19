<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Form\ProprieteType;
use App\Repository\ProprieteRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/propriete")
 */
class AdminProprieteController extends AbstractController
{
    /**
     * @Route("/", name="admin_propriete")
     */
    public function index(
        ProprieteRepository $proprieteRepository,
        PaginatorInterface $pagination,
        Request $request
    ): Response {
        $proprietes = $pagination->paginate(
            $proprieteRepository->All(),
            $request->query->getInt('page', 1),
            7
        );
        return $this->render('backoffice/propriete/propriete.html.twig', [
            'current' => 'propriete',
            'proprietes' => $proprietes,

        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Propriete $propriete): Response
    {
        $form = $this->createForm(ProprieteType::class, $propriete);
        return $this->render('backoffice/propriete/show.html.twig', [
            "propriete" => $propriete,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="create")
     */
    public function create(
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $propriete = new Propriete();
        $form = $this->createForm(ProprieteType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $propriete->setCreatedAt(new DateTime('now'));
            $manager->persist($data);
            $manager->flush();
            return $this->redirectToRoute('show', ['id' => $propriete->getId()]);
        }
        return $this->render('backoffice/propriete/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="delete")
     */
    public function delete(
        Propriete $propriete,
        EntityManagerInterface $manager
    ): Response {
        $manager->remove($propriete);
        $manager->flush();
        return $this->redirectToRoute('admin_propriete');
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(
        Propriete $propriete,
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $form = $this->createForm(ProprieteType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $manager->persist($data);
            $manager->flush();
            return $this->redirectToRoute('admin_propriete');
        }
        return $this->render('backoffice/propriete/edit.html.twig', [
            'propriete' => $propriete,
            'form' => $form->createView(),
        ]);
    }
}
