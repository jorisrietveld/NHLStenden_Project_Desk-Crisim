<?php

namespace App\Repository;

use App\Entity\StateUpdateEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StateUpdateEvent|null find( $id, $lockMode = null, $lockVersion = null )
 * @method StateUpdateEvent|null findOneBy( array $criteria, array $orderBy = null )
 * @method StateUpdateEvent[]    findAll()
 * @method StateUpdateEvent[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class StateUpdateEventRepository extends ServiceEntityRepository
{
    public function __construct( RegistryInterface $registry )
    {
        parent::__construct( $registry, StateUpdateEvent::class );
    }

    // /**
    //  * @return StateUpdateEvent[] Returns an array of StateUpdateEvent objects
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
    public function findOneBySomeField($value): ?StateUpdateEvent
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
