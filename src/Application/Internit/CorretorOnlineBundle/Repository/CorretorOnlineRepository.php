<?php

namespace App\Application\Internit\CorretorOnlineBundle\Repository;

use App\Application\Internit\CorretorOnlineBundle\Entity\CorretorOnline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CorretorOnline>
 *
 * @method CorretorOnline|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorretorOnline|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorretorOnline[]    findAll()
 * @method CorretorOnline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorretorOnlineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CorretorOnline::class);
    }


}