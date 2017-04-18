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

    public function getIdByMasnagitutyunName($name)
    {
        return $this->getEntityManager()
            ->createQuery("Select m.id
                            From AdminBundle:Masnagitutyun m
                            where m.name = :name")
            ->setParameter('name', $name)
            ->getResult();
    }
}