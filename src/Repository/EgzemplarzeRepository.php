<?php

namespace App\Repository;

use App\Entity\Egzemplarze;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Egzemplarze|null find($id, $lockMode = null, $lockVersion = null)
 * @method Egzemplarze|null findOneBy(array $criteria, array $orderBy = null)
 * @method Egzemplarze[]    findAll()
 * @method Egzemplarze[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EgzemplarzeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Egzemplarze::class);
    }

    // /**
    //  * @return Egzemplarze[] Returns an array of Egzemplarze objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Egzemplarze
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
