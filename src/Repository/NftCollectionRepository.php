<?php

namespace App\Repository;

use App\Entity\NftCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NftCollection>
 *
 * @method NftCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method NftCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method NftCollection[]    findAll()
 * @method NftCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NftCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NftCollection::class);
    }

//    /**
//     * @return NftCollection[] Returns an array of NftCollection objects
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

//    public function findOneBySomeField($value): ?NftCollection
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
