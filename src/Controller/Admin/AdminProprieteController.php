<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Form\ProprieteType;
use App\Repository\ProprieteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

/**
 * @Route("/admin/propriete")
 */
class AdminProprieteController extends AbstractController
{
    /**
     * @Route("/", name="admin_propriete", methods={"GET"})
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
        return $this->render('backoffice/admin_propriete/index.html.twig', [
            'current' => 'propriete',
            'proprietes' => $proprietes,

        ]);
    }

    /**
     * @Route("/new", name="admin_propriete_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $propriete = new Propriete();
        $form = $this->createForm(ProprieteType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $propriete->setCreatedAt(new \DateTime());
            $entityManager->persist($propriete);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'vous venez d\'ajouter une nouvelle propriete'
            );
            return $this->redirectToRoute('admin_propriete', ['id' => $propriete->getId()]);
        }

        return $this->renderForm('backoffice/admin_propriete/new.html.twig', [
            'propriete' => $propriete,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_propriete_show", methods={"GET"})
     */
    public function show(Propriete $propriete): Response
    {
        return $this->render('backoffice/admin_propriete/show.html.twig', [
            'propriete' => $propriete,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_propriete_edit", methods={"GET","POST"})
     */
    public function edit(
        Request $request,
        Propriete $propriete,
        CacheManager $cacheManager,
        UploaderHelper $helper
    ): Response {
        $form = $this->createForm(ProprieteType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($propriete->getImageFile() instanceof UploadedFile) {
                $cacheManager->remove($helper->asset($propriete, 'imageFile'));
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'success',
                'propriete modifié avec success'
            );
            return $this->redirectToRoute('admin_propriete', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/admin_propriete/edit.html.twig', [
            'propriete' => $propriete,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_propriete_delete", methods={"POST"})
     */
    public function delete(
        Request $request,
        Propriete $propriete,
        CacheManager $cacheManager,
        UploaderHelper $helper
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $propriete->getId(), $request->request->get('_token'))) {
            $cacheManager->remove($helper->asset($propriete, 'imageFile'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($propriete);
            $entityManager->flush();
        }
        $this->addFlash(
           'alert',
           'vous venez de supprimer un bien'
        );
        return $this->redirectToRoute('admin_propriete',);
    }
}
