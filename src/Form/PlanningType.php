<?php

namespace App\Form;

use App\Entity\Planning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Delf_A1', DateType::class, [
                'widget' => 'choice'
            ])
            ->add('Delf_A2', DateType::class, [
                'widget' => 'choice'
            ])
            ->add('Delf_B1', DateType::class, [
                'widget' => 'choice'
            ])
            ->add('Delf_B2', DateType::class, [
                'widget' => 'choice'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
        ]);
    }
}
