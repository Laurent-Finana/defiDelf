<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginator)
    {
        parent::__construct($registry, Article::class);
    }

    public function paginateArticles(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC'),
            $page,
            10
        );
    }

    public function paginateArticlesByActuality(int $page, $value): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->createQueryBuilder('a')
            ->andWhere('a.actuality = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult()
            ,
            $page,
            5
        );
    }

     /**
     * @return Article[] Returns an array of Article objects
     */
    public function findByActuality($value): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.actuality = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    public function findByPress($value): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.press = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

     /**
     * @return Article[] Returns an array of Article objects
     */
    public function findByAction($value): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.action = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
