<?php

namespace App\Application\Internit\AcompanhamentoBundle\Entity;

use App\Application\Internit\AcompanhamentoBundle\Repository\AcompanhamentoRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'acompanhamento')]
#[ORM\Entity(repositoryClass: AcompanhamentoRepository::class)]
#[UniqueEntity('id')]
class Acompanhamento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }



}