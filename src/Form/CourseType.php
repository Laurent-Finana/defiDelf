<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Course;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'empty_data' => '',
                'label' => 'Titre du cours'
            ])
            ->add('fileFile', FileType::class, [
                'label' => 'Fichier à télécharger'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'empty_data' => ''
            ])
            ->add('created_at', DateTimeType::class, [
                'label' => 'Créé le :'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'attr' => ['class' => 'text-info'],
                'label_attr' => [
                    'class' => 'checkbox-inline',
                ],
                'empty_data' => ''
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
