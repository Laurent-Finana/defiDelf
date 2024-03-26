<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ProductionDTO 
{
    #[Assert\NotBlank([], 'Merci d\'indiquer votre nom')]
    #[Assert\Length(max: 200)]
    public string $lastname = '';

    #[Assert\NotBlank([], 'Merci d\'indiquer votre prénom')]
    #[Assert\Length(max: 200)]
    public string $firstname = '';

    #[Assert\NotBlank([], 'Merci d\'indiquer votre email')]
    #[Assert\Email()]
    public string $email = '';

    #[Assert\NotBlank([], 'Merci de rédiger votre message')]
    public string $text = '';
}