<?php

namespace App\Repository;

use App\Entity\JoinedUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JoinedUser|null find( $id, $lockMode = null, $lockVersion = null )
 * @method JoinedUser|null findOneBy( array $criteria, array $orderBy = null )
 * @method JoinedUser[]    findAll()
 * @method JoinedUser[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class JoinedUserRepository extends ServiceEntityRepository
{
    public function __construct( RegistryInterface $registry )
    {
        parent::__construct( $registry, JoinedUser::class );
    }

    // /**
    //  * @return JoinedUser[] Returns an array of JoinedUser objects
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
    public function findOneBySomeField($value): ?JoinedUser
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
