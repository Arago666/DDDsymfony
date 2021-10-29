<?php

namespace App\Entity;

use App\Entity\TransferObject\MovieDto;

class Movie
{
    private string $id;
    private string $name;
    private int $durationInMinutes;

    public function __construct(string $id, MovieDto $movieDto)
    {
        $this->id = $id;
        $this->name = $movieDto->name;
        $this->durationInMinutes = $movieDto->durationInMinutes;
    }

    public function getDurationInMinutes(): int
    {
        return $this->durationInMinutes;
    }
}