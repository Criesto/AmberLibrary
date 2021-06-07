<?php

namespace App\Repository;

use App\Entity\Wypozyczenia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Wypozyczenia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wypozyczenia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wypozyczenia[]    findAll()
 * @method Wypozyczenia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WypozyczeniaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wypozyczenia::class);
    }

    // /**
    //  * @return Wypozyczenia[] Returns an array of Wypozyczenia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wypozyczenia
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
