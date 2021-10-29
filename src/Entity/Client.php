<?php

namespace App\Entity;

use App\Entity\ValueObject\NameClient;

class Client
{
    private string $id;
    private NameClient $name;
    private string $phone;

    public function __construct(string $id, NameClient $name, string $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function setId(string $id): Client
    {
        $this->id = $id;

        return $this;
    }

    public function setName(NameClient $name): Client
    {
        $this->name = $name;

        return $this;
    }

    public function setPhone(string $phone): Client
    {
        $this->phone = $phone;

        return $this;
    }
}