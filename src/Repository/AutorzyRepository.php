<?php

namespace App\Repository;

use App\Entity\Autorzy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Autorzy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autorzy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autorzy[]    findAll()
 * @method Autorzy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutorzyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autorzy::class);
    }

    // /**
    //  * @return Autorzy[] Returns an array of Autorzy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Autorzy
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
