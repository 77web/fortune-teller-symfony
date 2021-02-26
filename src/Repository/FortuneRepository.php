<?php

namespace App\Repository;

use App\Entity\Fortune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fortune|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fortune|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fortune[]    findAll()
 * @method Fortune[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FortuneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fortune::class);
    }

    // /**
    //  * @return Fortune[] Returns an array of Fortune objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fortune
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
