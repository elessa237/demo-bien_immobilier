<?php

namespace App\Form;

use App\Entity\ProprieteSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProprieteSearch::class,
        ]);
    }
}
