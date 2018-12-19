<?php

namespace App\Repository;

use App\Entity\SupervisorLogSubjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SupervisorLogSubjects|null find( $id, $lockMode = null, $lockVersion = null )
 * @method SupervisorLogSubjects|null findOneBy( array $criteria, array $orderBy = null )
 * @method SupervisorLogSubjects[]    findAll()
 * @method SupervisorLogSubjects[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class SupervisorLogSubjectsRepository extends ServiceEntityRepository
{
    public function __construct( RegistryInterface $registry )
    {
        parent::__construct( $registry, SupervisorLogSubjects::class );
    }

    // /**
    //  * @return SupervisorLogSubjects[] Returns an array of SupervisorLogSubjects objects
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
    public function findOneBySomeField($value): ?SupervisorLogSubjects
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
