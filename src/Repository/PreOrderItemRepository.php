<?php

namespace App\Repository;

use App\Entity\PreOrderItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PreOrderItem>
 *
 * @method PreOrderItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreOrderItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreOrderItem[]    findAll()
 * @method PreOrderItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreOrderItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreOrderItem::class);
    }

//    /**
//     * @return PreOrderItem[] Returns an array of PreOrderItem objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PreOrderItem
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
