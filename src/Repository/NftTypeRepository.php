<?php

namespace App\Repository;

use App\Entity\NftType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NftType>
 *
 * @method NftType|null find($id, $lockMode = null, $lockVersion = null)
 * @method NftType|null findOneBy(array $criteria, array $orderBy = null)
 * @method NftType[]    findAll()
 * @method NftType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NftTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NftType::class);
    }

//    /**
//     * @return NftType[] Returns an array of NftType objects
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

//    public function findOneBySomeField($value): ?NftType
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
