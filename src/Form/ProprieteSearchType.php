<?php

namespace App\Form;

use App\Entity\Options;
use App\Entity\ProprieteSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProprieteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prixMax', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Entrer votre budget maximum',
                    'class' => 'form-control',  
                ],
            'required' => false,
            ])
            ->add('surfaceMax', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Entrer la surface maximum voulu',
                    'class' => 'form-control'
                ],
                'required' => false,
            ])
            ->add('options',EntityType::class,[
                    'class' => Options::class,
                    'required'=> false,
                    'multiple' => true,
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProprieteSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }
    
    public function getBlockPrefix()
    {
        return '';
    }
}
