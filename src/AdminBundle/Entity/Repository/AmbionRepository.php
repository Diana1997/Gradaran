<?php
namespace AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class AmbionRepository extends EntityRepository
{
    public function findAmbionByFakultetId($id)
    {
        return $this->getEntityManager()
                ->createQuery("Select a.id, a.name
                        FROM AdminBundle:Ambion a
                        WHERE a.fakultet = :id")
            ->setParameter('id', $id)
            ->getArrayResult();
    }

}