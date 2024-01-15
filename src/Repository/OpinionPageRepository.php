<?php

namespace App\Repository;

use App\Entity\OpinionPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpinionPage>
 *
 * @method OpinionPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpinionPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpinionPage[]    findAll()
 * @method OpinionPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpinionPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpinionPage::class);
    }

//    /**
//     * @return OpinionPage[] Returns an array of OpinionPage objects
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

//    public function findOneBySomeField($value): ?OpinionPage
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
