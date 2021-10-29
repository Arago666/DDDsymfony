<?php

namespace App\Service;

use App\Aggregate\MovieSession;
use App\Repository\MovieSessionRepository;
use Doctrine\ORM\EntityManagerInterface;

class MovieSessionService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getMovieSessions(int $page, int $perPage): array
    {
        /**
         * @var MovieSessionRepository $userRepository
         */
        $movieSessionRepository = $this->entityManager->getRepository(MovieSession::class);


        return $movieSessionRepository->getMovieSession($page, $perPage);
    }

    public function getOne(string $movieSessionId): MovieSession
    {
        return parent::find($movieSessionId);
    }
}