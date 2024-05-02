<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'empty_data' => ''
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                // Get Form from Event
                $form = $event->getForm();
                // Get User from Form Event
                $user = $event->getData();

                // If User exist
                if ($user->getId() !== null) {
                    $form->add('password', PasswordType::class, [
                        'label' => 'Mot de passe',
                        'toggle' => true,
                        'hidden_label' => 'Masquer',
                        'visible_label' => 'Afficher',
                        'mapped' => false,
                        'attr' => [
                            'placeholder' => 'Laisser vide si inchangé'
                        ],
                        'constraints' => [
                            new Regex(
                                '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[_\W]).{8,}$/',
                                "Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial"
                            ),
                        ],
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
                'label' => 'Date de naissance(*)',
                'widget' => 'single_text',
                'empty_data' => date('now'),
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer votre date de naissance' 
                    ])
                ]
            ])
            ->add('phone_number', TelType::class, [
                'empty_data' => '',
                'label' => 'Téléphone'
            ])
            ->add('whatsApp', TelType::class, [
                'empty_data' => '',
                'label' => 'WhatsApp'
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
                'widget' => 'single_text',
                'empty_data' => date('now')
            ])
            ->add('employed', ChoiceType::class, [
                'label' => 'Avez-vous un emploi salarié actuellement ?',
                'choices' => [
                    'oui' => true,
                    'non' => false
                ],
                'multiple' => false,
                'expanded' => true
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
