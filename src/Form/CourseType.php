<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Course;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('description', CKEditorType::class, [
                'label' => 'Description',
                'empty_data' => ''
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
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
            ->add('active', CheckboxType::class, [
                'label' => 'Visible',
                'label_attr' => ['class' => 'text-success']
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
