<?php

namespace App\Aggregate;

use App\Entity\Client;
use App\Entity\Movie;
use http\Exception\InvalidArgumentException;
use \DateInterval;
use \DateTimeInterface;

class MovieSession
{
    private string $id;
    private Movie $movie;
    private DateTimeInterface $startTime;
    private int $quantityTickets;
    private array $tickets;

    public function __construct(string $id, Movie $movie, DateTimeInterface $startTime, int $quantityTickets)
    {
        $this->id = $id;
        $this->movie = $movie;
        $this->startTime = $startTime;
        $this->quantityTickets = $quantityTickets;
        $this->tickets = [];
    }

    /**
     * @param Client $client
     * @throws \InvalidArgumentException
     */
    public function addTickets(Client $client): void
    {
        if (!$this->isFreeTicket()) {
            throw new InvalidArgumentException("Отсутсвуют свободные билеты");
        }

        $this->tickets[] = $client;
    }

    public function isFreeTicket(): bool
    {
        return $this->getQuantityFreeTickets() > 0;
    }

    public function getQuantityFreeTickets(): int
    {
        return $this->quantityTickets - count($this->tickets);
    }

    public function getEndTime(): DateTimeInterface
    {
        $durationInMinutes = new DateInterval('PT' . $this->movie->getDurationInMinutes() . 'M');

        return $this->startTime->add($durationInMinutes);
    }
}