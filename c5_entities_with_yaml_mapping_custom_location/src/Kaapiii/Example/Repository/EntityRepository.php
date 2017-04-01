<?php

namespace Kaapiii\Example\Repository;

/**
 * EntityRepository
 *
 * @author Markus Liechti <markus@liechti.io>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class EntityRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Find all active and possible Slides
     *
     * @param integer $sliderId
     * @return array
     */
    public function findAllActiveEntities()
    {
        $dql = 'SELECT s FROM \Kaapiii\Example\Entity\Entity e '
                . 'WHERE a.active = 1 ';
        $em = $this->getEntityManager();
        $query = $em->createQuery($dql);
        return $query->getResult();
    }

}
