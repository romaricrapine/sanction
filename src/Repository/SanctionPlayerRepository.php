<?php

namespace App\Repository;

use App\Entity\SanctionPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SanctionPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SanctionPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SanctionPlayer[]    findAll()
 * @method SanctionPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SanctionPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SanctionPlayer::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SanctionPlayer $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(SanctionPlayer $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SanctionPlayer[] Returns an array of SanctionPlayer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SanctionPlayer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
