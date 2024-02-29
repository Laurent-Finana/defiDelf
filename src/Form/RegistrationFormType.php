<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom(*)',
                'empty_data' => ''
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom(*)',
                'empty_data' => ''
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email(*)',
                'empty_data' => ''
            ])
            ->add('phone_number', TextType::class, [
                'label' => 'Téléphone(*)',
                'empty_data' => ''
            ])
            ->add('whatsApp', TextType::class, [
                'label' => 'WhatsApp',
                'empty_data' => ''
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => [
                    'label' => 'Mot de passe(*)',
                    'hash_property_path' => 'password',
                    'attr' => [
                        'placeholder' => 'Choisissez un mot de passe',
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmation du mot de passe(*)',
                    'attr' => [
                        'placeholder' => 'Confirmez votre mot de passe',
                    ]

                ],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer un mot de passe',
                    ]),
                    new Regex(
                        '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*\-+_\.\/]).{8,}$/',
                        "Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial"
                    ),
                    new Length([
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nationality', TextType::class, [
                'label' => 'Nationalité',
                'empty_data' => '',
                'required' => false
            ])
            ->add('job', TextType::class, [
                'label' => 'Profession',
                'empty_data' => '',
                'required' => false
            ])
            ->add('save', SubmitType::class, [
                'label' => 'S\'enregistrer',
                'attr' => ['class' => 'd-block mx-auto btn-primary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
