<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Taskv2>
 *
 * @method Taskv2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taskv2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taskv2[]    findAll()
 * @method Taskv2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Taskv2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taskv2::class);
    }

//    /**
//     * @return Taskv2[] Returns an array of Taskv2 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Taskv2
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
