<?php

namespace App\Repository;

use App\Entity\Czytelnik;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Czytelnik|null find($id, $lockMode = null, $lockVersion = null)
 * @method Czytelnik|null findOneBy(array $criteria, array $orderBy = null)
 * @method Czytelnik[]    findAll()
 * @method Czytelnik[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CzytelnikRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Czytelnik::class);
    }

    // /**
    //  * @return Czytelnik[] Returns an array of Czytelnik objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Czytelnik
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
