<?php
namespace AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function findBookByMasnagitutyunId($id)
    {
        return $this->getEntityManager()
                ->createQuery("SELECT b.id, b.bookTitle, b.author, b.ararka, b.kisamyak, b.srcImage
                                FROM AdminBundle:Book b
                                WHERE b.masnagitutyun = :id")
                ->setParameter('id', $id)
                ->getArrayResult();

    }

   public function findPathByBookId($id)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT bk.path
                           FROM AdminBundle:Book  bk
                           WHERE bk.id = :id")
            ->setParameter('id', $id)
            ->getResult();

    }
}