<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * ClubRepository
 *
 */
class ClubRepository extends EntityRepository
{

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getClubsBaseQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder()->select('b')->from('MybetsResultBundle:Club', 'b');
    }

    /**
     * @param int $limit
     * @return \Doctrine\ORM\Query
     */
    public function getClubsQuery($limit = 200)
    {
        return $this->getClubsBaseQueryBuilder()->orderBy('b.id', 'DESC')->setMaxResults($limit)->getQuery();
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
            $dateStr = $this->getClubsBaseQueryBuilder()->select('MAX(b.updated)')->setMaxResults(1)->getQuery()->getSingleScalarResult();
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
    public function getClubQuery($id)
    {
        return $this->getClubsBaseQueryBuilder()->where('b.id = :id')->setParameter('id', $id)->getQuery();
    }

}