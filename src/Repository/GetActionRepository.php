<?php

namespace App\Repository;

use App\Entity\GetAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GetAction>
 *
 * @method GetAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method GetAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method GetAction[]    findAll()
 * @method GetAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GetActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GetAction::class);
    }

//    /**
//     * @return GetAction[] Returns an array of GetAction objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GetAction
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
