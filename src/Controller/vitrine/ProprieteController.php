<?php

namespace App\Controller\vitrine;

use App\Entity\Contact;
use App\Entity\Propriete;
use App\Entity\ProprieteSearch;
use App\Form\ContactType;
use App\Form\ProprieteSearchType;
use App\Notification\ContactNotification;
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
    public function index(
        ProprieteRepository $proprieteRepository,
        Request $request,
        PaginatorInterface $pagination
    ): Response {
        $search = new ProprieteSearch();

        $form = $this->createForm(ProprieteSearchType::class, $search);
        $form->handleRequest($request);

        $proprietes = $pagination->paginate(
            $proprieteRepository->recherche($search),
            $request->query->getInt('page', 1),
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
    public function show(
        Propriete $propriete,
        string $slug,
        Request $request,
        ContactNotification $notification
    ): Response {
        if ($propriete->getSlug() != $slug) {
            return $this->redirectToRoute('propriete_show', [
                'id' => $propriete->getId(),
                'slug' => $propriete->getSlug(),
            ]);
        }

        $contact = new Contact();
        $contact->setPropriete($propriete);
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notifie($contact);
            $this->addFlash(
                'success',
                'Votre message a été envoyer avec success'
            );
            return $this->redirectToRoute('propriete_show', [
                'id' => $propriete->getId(),
                'slug' => $propriete->getSlug(),
            ]);
        }

        return $this->render('vitrine/propriete/show.html.twig', [
            'propriete' => $propriete,
            'form' => $form->createView(),
        ]);
    }
}
