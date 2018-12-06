<?php

namespace App\Repository;

use App\Entity\Jsonfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jsonfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jsonfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jsonfile[]    findAll()
 * @method Jsonfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JsonfileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jsonfile::class);
    }

    // /**
    //  * @return Jsonfile[] Returns an array of Jsonfile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jsonfile
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
