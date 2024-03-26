<?php

namespace App\Form;

use App\DTO\ProductionDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'empty_data' => ''
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'empty_data' => ''
            ])
            ->add('email', EmailType::class, [
                'empty_data' => ''
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Votre texte',
                'attr' => ['style' => 'height:300px'],
                'empty_data' => ''
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'd-block mx-auto btn-primary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductionDTO::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
