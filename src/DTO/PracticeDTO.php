<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class PracticeDTO
{
    #[Assert\NotBlank([],'Merci d\'entrer votre prénom')]
    #[Assert\Length(max: 200)]
    public string $firstname = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre nom')]
    #[Assert\Length(max: 200)]
    public string $lastname = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre email')]
    #[Assert\Email()]
    public string $email = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre numéro de téléphone')]
    public string $telephone_number_one = '';

    public string $telephone_number_two = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre nationalité')]
    #[Assert\Length(max: 100)]
    public string $nationality = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre adresse')]
    #[Assert\Length(max: 200)]
    public string $address = '';

    #[Assert\Length(max: 200)]
    public string $add_on_address = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre code postal')]
    #[Assert\Length(max: 50)]
    public string $postal_code = '';

    #[Assert\NotBlank([],'Merci d\'entrer votre ville')]
    #[Assert\Length(max: 200)]
    public string $city = '';

    #[Assert\Count(min: 1, max: 2, minMessage: 'Vous devez sélectionner au moins 1 compétence', maxMessage: 'Vous ne pouvez sélectionner plus de 2 compétences')]
    public array $level = [];
}