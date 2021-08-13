<?php

namespace App\Form;

use App\Entity\Propriete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProprieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('description',null,
                [
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'height: 300px;'
                    ],
                ]
            )
            ->add('surface',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('piece',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('etage',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('prix',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('chauffage',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('ville',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('adresse',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('codePostal',null,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('vendu',null,
                [
                    'attr' => [
                        'class' => 'form-check'
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Propriete::class,
        ]);
    }
}
