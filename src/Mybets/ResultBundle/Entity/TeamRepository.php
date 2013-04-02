<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * TeamRepository
 *
 */
class TeamRepository extends EntityRepository
{

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTeamsBaseQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder()->select('b')->from('MybetsResultBundle:Team', 'b');
    }

    /**
     * @param int $limit
     * @return \Doctrine\ORM\Query
     */
    public function getTeamsQuery($limit = 200)
    {
        return $this->getTeamsBaseQueryBuilder()->orderBy('b.id', 'DESC')->setMaxResults($limit)->getQuery();
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
            $dateStr = $this->getTeamsBaseQueryBuilder()->select('MAX(b.updated)')->setMaxResults(1)->getQuery()->getSingleScalarResult();
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
    public function getTeamQuery($id)
    {
        return $this->getTeamsBaseQueryBuilder()->where('b.id = :id')->setParameter('id', $id)->getQuery();
    }

}