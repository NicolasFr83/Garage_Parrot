<?php

namespace App\Repository;

use App\Entity\OpenningGarage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpenningGarage>
 *
 * @method Openninggarage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Openninggarage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Openninggarage[]    findAll()
 * @method Openninggarage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenningGarageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpenningGarage::class);
    }

//    /**
//     * @return OpenningGarage[] Returns an array of OpenningGarage objects
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

//    public function findOneBySomeField($value): ?OpenningGarage
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
