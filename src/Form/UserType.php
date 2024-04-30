<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'empty_data' => ''
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Apprenant' => 'ROLE_APPRENANT',
                    'Professeur' => 'ROLE_PROF',
                    'Administrateur' => 'ROLE_ADMIN'
                ],
                'multiple' => true,
                'expanded' => true,
                'label' => 'Rôle(s)',
                'label_attr' => [
                    'class' => 'checkbox-inline',
                ]
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                // Get Form from Event
                $form = $event->getForm();
                // Get User from Form Event
                $user = $event->getData();

                // If User exist
                if ($user->getId() !== null) {
                    // Edit User Password
                    $form->add('password', PasswordType::class, [
                        'label' => 'Mot de passe',
                        'mapped' => false,
                        'attr' => [
                            'placeholder' => 'Laissez vide si inchangé'
                        ],
                        'constraints' => [
                            new Regex(
                                '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[_\W]).{8,}$/',
                                "Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial"
                            ),
                        ],
                        'toggle' => true,
                        'hidden_label' => 'Masquer',
                        'visible_label' => 'Afficher',
                    ]);
                } else {
                    // New
                    $form->add('password', PasswordType::class, [
                        'label' => 'Mot de passe',
                        'empty_data' => '',
                        // Constraints which was on Entity are declared below
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Merci d\'entrer un mot de passe',
                            ]),
                            new Regex(
                                '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[_\W]).{8,}$/',
                                "Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial"
                            ),
                            new Length([
                                'max' => 4096,
                            ]),
                        ],
                        'toggle' => true,
                        'hidden_label' => 'Masquer',
                        'visible_label' => 'Afficher',
                    ]);
                }
            })
            ->add('lastname', TextType::class, [
                'empty_data' => '',
                'label' => 'Nom'
            ])
            ->add('firstname', TextType::class, [
                'empty_data' => '',
                'label' => 'Prénom'
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text'
            ])
            ->add('phone_number', TextType::class, [
                'empty_data' => '',
                'label' => 'Téléphone'
            ])
            ->add('whatsApp', TextType::class, [
                'empty_data' => '',
                'label' => 'WhatsApp'
            ])
            ->add('nationality', TextType::class, [
                'empty_data' => '',
                'label' => 'Nationalité'
            ])
            ->add('job', TextType::class, [
                'empty_data' => '',
                'label' => 'Profession'
            ])
            ->add('entryDate', DateType::class, [
                'label' => 'Date d\'entrée en France',
                'widget' => 'single_text'
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
