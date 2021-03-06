<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Traobject|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traobject|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traobject[]    findAll()
 * @method Traobject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraobjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Traobject::class);
    }

    public function findLastTraobjectByState(State $state, int $limit): array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 'c', 's')
            ->innerJoin('t.category', 'c')
            ->innerJoin('t.state', 's')
            ->where($qb->expr()->eq('s.id', ':state'))
            ->orderBy('t.createdAt', 'DESC');


        return $qb->setParameter(':state', $state->getId())
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findTraobjectByCat(Category $cat, State $state, int $limit): array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 'c', 's')
                ->innerJoin('t.category', 'c')
                ->innerJoin('t.state', 's')
                ->where($qb->expr()->eq('s.id', ':state'))
                ->andwhere($qb->expr()->eq('c.id', ':cat'))
                ->orderBy('t.createdAt', 'DESC');


            return $qb->setParameter(':state', $state->getId())
                ->setParameter(':cat', $cat->getId())
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();

    }

    /**
     * @return string
     */
    public function getNb()
    {
        try {
            return $this->createQueryBuilder('traobject')
                ->select('COUNT(traobject)')
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
    }



    // /**
    //  * @return Traobject[] Returns an array of Traobject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Traobject
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
