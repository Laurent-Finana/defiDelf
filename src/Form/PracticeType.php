<?php

namespace App\Form;

use App\DTO\PracticeDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PracticeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'empty_data' => '',
                'label' => 'Prénom',
            ])
            ->add('lastname', TextType::class, [
                'empty_data' => '',
                'label' => 'Nom'
            ])
            ->add('email', EmailType::class, [
                'empty_data' => ''
            ])
            ->add('telephone_number_one', TextType::class, [
                'empty_data' => '',
                'label' => 'Téléphone'
            ])
            ->add('telephone_number_two', TextType::class, [
                'empty_data' => '',
                'label' => 'WhatsApp',
            ])
            ->add('nationality', TextType::class, [
                'empty_data' => '',
                'label' => 'Nationalité'
            ])
            ->add('address', TextType::class, [
                'empty_data' => '',
                'label' => 'Adresse'
            ])
            ->add('add_on_address', TextType::class, [
                'empty_data' => '',
                'label' => 'Complément d\'adresse',
            ])
            ->add('postal_code', TextType::class, [
                'empty_data' => '',
                'label' => 'Code postal'
            ])
            ->add('city', TextType::class, [
                'empty_data' => '',
                'label' => 'Ville'
            ])
            ->add('level', ChoiceType::class, [
                'empty_data' => [],
                'label' => 'Niveau (Veuillez choisir 2 niveaux maximum)',
                'choices' => [
                    'Delf A1' => 'Delf A1',
                    /* 'Delf A2' => 'Delf A2', */
                    'Delf B1' => 'Delf B1',
                    'Delf B2' => 'Delf B2'
                ],
                'multiple' => true,
                'expanded' => true,
                'attr' => ['class' => 'text-info fw-bold'],
                'label_attr' => [
                    'class' => 'checkbox-inline form-check-inline',
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PracticeDTO::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
