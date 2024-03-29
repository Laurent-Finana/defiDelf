<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Course>
 *
 * @method Course|null find($id, $lockMode = null, $lockVersion = null)
 * @method Course|null findOneBy(array $criteria, array $orderBy = null)
 * @method Course[]    findAll()
 * @method Course[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginator)
    {
        parent::__construct($registry, Course::class);
    }

    public function paginateArticles(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->createQueryBuilder('cr')
            ->orderBy('cr.id', 'DESC')
            ,
            $page,
            5
        );
    }


    /* public function findWithCategory(): array
    {
        return $this->createQueryBuilder('cr')
            ->select('cr', 'cg')
            ->leftJoin('cr.category', 'cg')
            ->getQuery()
            ->getResult();
    } */
    
    public function findByCategory($cat): array
    {
        return $this->createQueryBuilder('cr')
            ->select('cr', 'cg')
            ->leftJoin('cr.category', 'cg')
            ->andWhere('cg.id = :val')
            ->andWhere('cr.active = true')
            ->setParameter('val', $cat)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Course[] Returns an array of Course objects
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

//    public function findOneBySomeField($value): ?Course
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
