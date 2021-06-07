<?php

namespace App\Repository;

use App\Entity\Ksiazki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ksiazki|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ksiazki|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ksiazki[]    findAll()
 * @method Ksiazki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KsiazkiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ksiazki::class);
    }

    // /**
    //  * @return Ksiazki[] Returns an array of Ksiazki objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ksiazki
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
