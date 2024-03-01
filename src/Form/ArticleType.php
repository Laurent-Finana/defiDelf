<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('thumbnailFile', FileType::class)
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'empty_data' => ''
            ])
            ->add('content',TextType::class, [
                'label' => 'Contenu',
                'empty_data' => ''
            ])
            ->add('press', ChoiceType::class, [
                'empty_data' => '',
                'label' => 'Article de presse ?',
                'choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                'multiple' => false,
                'expanded' => true,
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
        ]);
    }
}
