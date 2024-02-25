<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
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
    #[Assert\Length(min: 3, max: 2048)]
    public string $message = '';


}