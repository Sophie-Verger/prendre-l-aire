<?php

namespace App\Repository;

use App\Entity\Comment;
use App\Entity\Area;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }
    
    /**
    * @return Comment[] Returns an array of Comment objects
    */
    public function findAverageRateByArea($id)
    {
        return $this->getEntityManager()
            ->createQuery('
            SELECT AVG(c.rate)
            FROM App\Entity\Comment c
            WHERE c.area = :val
        ')
        ->setParameter('val', $id)
        ->getResult();
    }
    
            
    

    /*
    public function findOneBySomeField($value): ?Comment
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
