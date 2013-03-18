<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * TournamentRepository
 *
 */
class TournamentRepository extends EntityRepository
{

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTournamentsBaseQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder()->select('b')->from('MybetsResultBundle:Tournament', 'b');
    }

    /**
     * @param int $limit
     * @return \Doctrine\ORM\Query
     */
    public function getTournamentsQuery($limit = 200)
    {
        return $this->getTournamentsBaseQueryBuilder()->orderBy('b.id', 'DESC')->setMaxResults($limit)->getQuery();
    }

    /**
     * Returns max updated value
     *
     * @return \DateTime
     */
    public function getMaxUpdated()
    {
        try
        {
            $dateStr = $this->getTournamentsBaseQueryBuilder()->select('MAX(b.updated)')->setMaxResults(1)->getQuery()->getSingleScalarResult();
            return new \DateTime($dateStr);
        }
        catch (NonUniqueResultException $e)
        {
            return null;
        }
    }

    /**
     * @param int $id
     * @return \Doctrine\ORM\Query
     */
    public function getTournamentQuery($id)
    {
        return $this->getTournamentsBaseQueryBuilder()->where('b.id = :id')->setParameter('id', $id)->getQuery();
    }

}