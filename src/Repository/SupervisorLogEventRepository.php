<?php

namespace App\Repository;

use App\Entity\SupervisorLogEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SupervisorLogEvent|null find( $id, $lockMode = null, $lockVersion = null )
 * @method SupervisorLogEvent|null findOneBy( array $criteria, array $orderBy = null )
 * @method SupervisorLogEvent[]    findAll()
 * @method SupervisorLogEvent[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class SupervisorLogEventRepository extends ServiceEntityRepository
{
    public function __construct( RegistryInterface $registry )
    {
        parent::__construct( $registry, SupervisorLogEvent::class );
    }

    // /**
    //  * @return SupervisorLogEvent[] Returns an array of SupervisorLogEvent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SupervisorLogEvent
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
