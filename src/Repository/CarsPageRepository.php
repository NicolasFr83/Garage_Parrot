<?php

namespace App\Repository;

use App\Entity\CarsPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarsPage>
 *
 * @method CarsPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsPage[]    findAll()
 * @method CarsPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarsPage::class);
    }

//    /**
//     * @return CarsPage[] Returns an array of CarsPage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarsPage
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
