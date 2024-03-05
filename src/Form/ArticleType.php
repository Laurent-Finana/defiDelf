<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('thumbnailFile', FileType::class, [
                'label' => 'Fichier image'
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'empty_data' => ''
            ])
            ->add('content',TextareaType::class, [
                'label' => 'Contenu',
                'empty_data' => ''
            ])
            ->add('press', CheckboxType::class, [
                'label' => 'Presse',
                'data' => false,
                'required' => false
               ])
            ->add('external_link', TextType::class, [
                'label' => 'Lien externe',
                'empty_data' => ''
            ])
            ->add('thumbnailPressFile', FileType::class, [
                'label' => 'Fichier image presse'
            ])
            ->add('created_at', DateTimeType::class, [
                'label' => 'Créé le :'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
