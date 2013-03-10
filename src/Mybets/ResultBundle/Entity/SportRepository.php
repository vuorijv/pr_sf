<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * SportRepository
 *
 */
class SportRepository extends EntityRepository
{

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getSportsBaseQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder()->select('b')->from('MybetsResultBundle:Sport', 'b');
    }

    /**
     * @param int $limit
     * @return \Doctrine\ORM\Query
     */
    public function getSportsQuery($limit = 200)
    {
        return $this->getSportsBaseQueryBuilder()->orderBy('b.id', 'DESC')->setMaxResults($limit)->getQuery();
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
            $dateStr = $this->getSportsBaseQueryBuilder()->select('MAX(b.updated)')->setMaxResults(1)->getQuery()->getSingleScalarResult();
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
    public function getSportQuery($id)
    {
        return $this->getSportsBaseQueryBuilder()->where('b.id = :id')->setParameter('id', $id)->getQuery();
    }

}