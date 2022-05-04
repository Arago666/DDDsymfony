<?php

namespace App\Repository;

use App\Aggregate\MovieSession;
use Doctrine\ORM\EntityRepository;

class MovieSessionRepository extends EntityRepository
{
    /**
     * @return MovieSession[]
     */
    public function getMovieSession(int $page, int $perPage): array
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('t')
            ->from($this->getClassName(), 't')
            ->orderBy('t.id', 'DESC')
            ->setFirstResult($perPage * $page)
            ->setMaxResults($perPage);

        return $qb->getQuery()->getResult();
    }

}