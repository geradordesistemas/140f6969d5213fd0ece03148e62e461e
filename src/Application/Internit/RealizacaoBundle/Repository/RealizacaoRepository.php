<?php

namespace App\Application\Internit\RealizacaoBundle\Repository;

use App\Application\Internit\RealizacaoBundle\Entity\Realizacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Realizacao>
 *
 * @method Realizacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realizacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realizacao[]    findAll()
 * @method Realizacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealizacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realizacao::class);
    }


}