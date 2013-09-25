<?php

namespace Blog\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
    public function getActivePost()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb = $qb
            ->select('p')
            ->from('Blog\Entity\Post', 'p')
            ->where('p.created < :now')
            ->setParameter('now', new \DateTime())
        ;

        return $qb->getQuery();
    }
}
