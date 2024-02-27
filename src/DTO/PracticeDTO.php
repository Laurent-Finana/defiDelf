<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class PracticeDTO
{
    #[Assert\NotBlank()]
    #[Assert\Length(max: 200)]
    public string $firstname = '';

    #[Assert\NotBlank()]
    #[Assert\Length(max: 200)]
    public string $lastname = '';

    #[Assert\NotBlank()]
    #[Assert\Email()]
    public string $email = '';

    #[Assert\NotBlank()]
    public string $telephone_number_one = '';

    public string $telephone_number_two = '';

    #[Assert\NotBlank()]
    #[Assert\Length(max: 100)]
    public string $nationality = '';

    #[Assert\NotBlank()]
    #[Assert\Length(max: 200)]
    public string $address = '';

    #[Assert\Length(max: 200)]
    public string $add_on_address = '';

    #[Assert\NotBlank()]
    #[Assert\Length(max: 50)]
    public string $postal_code = '';

    #[Assert\NotBlank()]
    #[Assert\Length(max: 200)]
    public string $city = '';

    #[Assert\Count(min: 1, max: 2, minMessage: 'Vous devez sélectionner au moins 1 compétence', maxMessage: 'Vous ne pouvez sélectionner plus de 2 compétences')]
    public array $level = [];
}