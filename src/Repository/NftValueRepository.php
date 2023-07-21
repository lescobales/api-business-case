<?php

namespace App\Repository;

use App\Entity\NftValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NftValue>
 *
 * @method NftValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method NftValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method NftValue[]    findAll()
 * @method NftValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NftValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NftValue::class);
    }

//    /**
//     * @return NftValue[] Returns an array of NftValue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NftValue
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
