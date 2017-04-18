<?php
namespace AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class MasnagitutyunRepository extends EntityRepository
{
    public function findMasnagitutyunByAmbionId($id)
    {
        return $this->getEntityManager()
            ->createQuery("Select m.id, m.name
                        FROM AdminBundle:Masnagitutyun m
                        WHERE m.ambion = :id")
           ->setParameter('id', $id)
            ->getArrayResult();
    }

}