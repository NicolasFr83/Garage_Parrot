<?php

namespace App\Repository;

use App\Entity\Openninggarage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Openninggarage>
 *
 * @method Openninggarage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Openninggarage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Openninggarage[]    findAll()
 * @method Openninggarage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenninggarageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Openninggarage::class);
    }

//    /**
//     * @return Openninggarage[] Returns an array of Openninggarage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Openninggarage
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
