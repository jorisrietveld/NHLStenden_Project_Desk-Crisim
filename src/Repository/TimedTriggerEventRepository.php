<?php

namespace App\Repository;

use App\Entity\TimedTriggerEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TimedTriggerEvent|null find( $id, $lockMode = null, $lockVersion = null )
 * @method TimedTriggerEvent|null findOneBy( array $criteria, array $orderBy = null )
 * @method TimedTriggerEvent[]    findAll()
 * @method TimedTriggerEvent[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class TimedTriggerEventRepository extends ServiceEntityRepository
{
    public function __construct( RegistryInterface $registry )
    {
        parent::__construct( $registry, TimedTriggerEvent::class );
    }

    // /**
    //  * @return TimedTriggerEvent[] Returns an array of TimedTriggerEvent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TimedTriggerEvent
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
