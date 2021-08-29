<?php

namespace App\Form;

use App\Entity\Options;
use App\Entity\Propriete;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('chauffage',ChoiceType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'choices'=>$this->getChoix(),
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
            ->add('imageFile', FileType::class,
                [
                    'required'=>false,
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add('vendu',null,
                [
                    'attr' => [
                        'class' => 'form-checkbox'
                    ],
                ]
            )
            ->add('options',EntityType::class,
                [
                'required' => false,
                    'class'=>Options::class,
                    'choice_label'=>'nom',
                    'multiple'=>true,
                    'attr' => [
                        'class' => 'form-control'
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

    public function getChoix()
    {
        $choix = ["oui","non"];
        $output =[];
        foreach ($choix as $key => $value) {
            $output[$value] = $key;
        }
        return $output;
    }
}
