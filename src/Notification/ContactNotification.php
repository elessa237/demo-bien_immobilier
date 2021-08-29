<?php

namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;

class ContactNotification
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer; 

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notifie(Contact $contact)
    {
        $message = (new \Swift_Message('Agence : '.$contact->getPropriete()->getTitre()))
        ->setFrom('noreply@agence.fr')
        ->setTo('contact@agence.cm')
        ->setReplyTo($contact->getEmail())
        ->setBody(
            $this->renderer->render('email/contact.html.twig', [
                'contact'=>$contact,
            ]),
            'text/html'
        );
        $this->mailer->send($message);
    }
}