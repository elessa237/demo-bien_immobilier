<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom...',
                    'class' => 'form-control',
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Prenom...',
                    'class' => 'form-control',
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email...',
                    'class' => 'form-control',
                ]
            ])
            ->add('numero', IntegerType::class, [
            'attr' => [
                'placeholder' => 'Numero...',
                'class' => 'form-control',
            ]
        ])
            ->add('message', TextareaType::class, [
            'attr' => [
                'placeholder' => 'Message...',
                'class' => 'form-control',
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
