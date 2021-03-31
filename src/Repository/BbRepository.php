<?php

namespace App\Repository;

use App\Entity\Bb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bb[]    findAll()
 * @method Bb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bb::class);
    }

    // /**
    //  * @return Bb[] Returns an array of Bb objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bb
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
