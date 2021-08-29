<?php

namespace App\Repository;

use App\Entity\Propriete;
use App\Entity\ProprieteSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Propriete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propriete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propriete[]    findAll()
 * @method Propriete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProprieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propriete::class);
    }

    /**
     * @return Propriete[]
     */
    public function Last()
    {
        return $this->createQueryBuilder('p')
            ->where('p.vendu = false')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Propriete[]
     */
    public function recherche(ProprieteSearch $search)
    {
        $query =  $this->createQueryBuilder('p')
            ->where("p.vendu = 0")
            ->orderBy('p.createdAt', 'DESC');
        if ($search->getPrixMax()) {
            $query = $query->andWhere('p.prix <= :prixMax')
                ->setParameter('prixMax', $search->getPrixMax());
        }

        if ($search->getSurfaceMax()) {
            $query = $query->andWhere('p.surface <= :surfaceMax')
                ->setParameter('surfaceMax', $search->getSurfaceMax());
        }

        if ($search->getOptions()->count() > 0) {
            $k=0;
            foreach ($search->getOptions() as  $option) {
                $k++;
                $query = $query->andWhere(":option$k MEMBER OF p.options")
                ->setParameter("option$k", $option);
            }
        }

        return $query = $query->getQuery()
            ->getResult();
    }

    /**
     * @return Propriete[]
     */
    public function Vendu()
    {
        return $this->createQueryBuilder('p')
            ->where('p.vendu = true')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function All()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Propriete[] Returns an array of Propriete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Propriete
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
