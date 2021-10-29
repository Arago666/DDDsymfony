<?php

namespace App\Entity\ValueObject;

class NameClient
{
    private string $firstName;

    public function __construct(string $firstName)
    {
        $this->firstName = $firstName;
    }
}