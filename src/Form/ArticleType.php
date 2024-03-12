<?php

namespace App\Form;

use App\Entity\Article;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('content',CKEditorType::class, [
                'label' => 'Contenu',
                'empty_data' => ''
            ])
            ->add('actuality', CheckboxType::class, [
                'label' => 'Actualités',
                'required' => false,
               ])
            ->add('press', CheckboxType::class, [
                'label' => 'Presse',
                'required' => false,
               ])
            ->add('action', CheckboxType::class, [
            'label' => 'Action',
            'required' => false,
            ])
            ->add('external_link', TextType::class, [
                'label' => 'Lien externe',
                'empty_data' => ''
            ])
            ->add('thumbnailPressFile', FileType::class, [
                'label' => 'Fichier image presse'
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
