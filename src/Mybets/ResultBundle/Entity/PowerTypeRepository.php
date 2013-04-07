<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * PowerTypeRepository
 *
 */
class PowerTypeRepository extends EntityRepository
{

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getPowerTypesBaseQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder()->select('b')->from('MybetsResultBundle:PowerType', 'b');
    }

    /**
     * @param int $limit
     * @return \Doctrine\ORM\Query
     */
    public function getPowerTypesQuery($limit = 200)
    {
        return $this->getPowerTypesBaseQueryBuilder()->orderBy('b.id', 'DESC')->setMaxResults($limit)->getQuery();
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
            $dateStr = $this->getPowerTypesBaseQueryBuilder()->select('MAX(b.updated)')->setMaxResults(1)->getQuery()->getSingleScalarResult();
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
    public function getPowerTypeQuery($id)
    {
        return $this->getPowerTypesBaseQueryBuilder()->where('b.id = :id')->setParameter('id', $id)->getQuery();
    }

}