<?php

namespace App\Application\Internit\EmpreendimentoBundle\Entity;

use App\Application\Internit\EmpreendimentoBundle\Repository\EmpreendimentoRepository;
use App\Application\Internit\TipoBundle\Entity\Tipo;
use App\Application\Internit\StatusBundle\Entity\Status;
use App\Application\Internit\TagBundle\Entity\Tag;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'empreendimento')]
#[ORM\Entity(repositoryClass: EmpreendimentoRepository::class)]
#[UniqueEntity('id')]
class Empreendimento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nome', type: 'string', unique: false, nullable: false)]
    private string $nome;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nomeDestaque', type: 'string', unique: false, nullable: false)]
    private string $nomeDestaque;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'url', type: 'string', unique: false, nullable: false)]
    private string $url;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'valorVenda', type: 'string', unique: false, nullable: false)]
    private string $valorVenda;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\Column(name: 'fitness', type: 'string', unique: false, nullable: true)]
    private ?string $fitness = null;

    #[ORM\Column(name: 'destaqueHome', type: 'boolean', unique: false, nullable: true)]
    private ?bool $destaqueHome = null;

    #[Assert\Date]
    #[ORM\Column(name: 'dataConclusao', type: 'date', unique: false, nullable: true)]
    private ?DateTime $dataConclusao = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'breveDescricao', type: 'text', unique: false, nullable: false)]
    private string $breveDescricao;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: false)]
    private string $descricao;

    #[ORM\Column(name: 'linkTourVirtual', type: 'string', unique: false, nullable: true)]
    private ?string $linkTourVirtual = null;

    #[ORM\Column(name: 'linkHotsite', type: 'string', unique: false, nullable: true)]
    private ?string $linkHotsite = null;

    #[ORM\Column(name: 'linkCorretor', type: 'string', unique: false, nullable: true)]
    private ?string $linkCorretor = null;

    #[ORM\Column(name: 'linkAppIOS', type: 'string', unique: false, nullable: true)]
    private ?string $linkAppIOS = null;

    #[ORM\Column(name: 'linkAppAndroid', type: 'string', unique: false, nullable: true)]
    private ?string $linkAppAndroid = null;

    #[ORM\ManyToOne(targetEntity: Tipo::class)]
    #[ORM\JoinColumn(name: 'tipo_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Tipo|null $tipo = null;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(name: 'status_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Status|null $status = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $imagemDestaque;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $logoImagem;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $imagemObraEntregue;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $imagemFichaImovel;

    #[ORM\JoinTable(name: 'tag_empreendimento')]
    #[ORM\JoinColumn(name: 'empreendimento_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'tag_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private Collection $tags;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $imagemTourVirtual;


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNomedestaque(): string
    {
        return $this->nomeDestaque;
    }

    public function setNomedestaque(string $nomeDestaque): void
    {
        $this->nomeDestaque = $nomeDestaque;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getValorvenda(): string
    {
        return $this->valorVenda;
    }

    public function setValorvenda(string $valorVenda): void
    {
        $this->valorVenda = $valorVenda;
    }

    public function getVisivel(): ?bool
    {
        return $this->visivel;
    }

    public function setVisivel(?bool $visivel): void
    {
        $this->visivel = $visivel;
    }

    public function getFitness(): ?string
    {
        return $this->fitness;
    }

    public function setFitness(?string $fitness): void
    {
        $this->fitness = $fitness;
    }

    public function getDestaquehome(): ?bool
    {
        return $this->destaqueHome;
    }

    public function setDestaquehome(?bool $destaqueHome): void
    {
        $this->destaqueHome = $destaqueHome;
    }

    public function getDataconclusao(): ?DateTime
    {
        return $this->dataConclusao;
    }

    public function setDataconclusao(?DateTime $dataConclusao): void
    {
        $this->dataConclusao = $dataConclusao;
    }

    public function getBrevedescricao(): string
    {
        return $this->breveDescricao;
    }

    public function setBrevedescricao(string $breveDescricao): void
    {
        $this->breveDescricao = $breveDescricao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getLinktourvirtual(): ?string
    {
        return $this->linkTourVirtual;
    }

    public function setLinktourvirtual(?string $linkTourVirtual): void
    {
        $this->linkTourVirtual = $linkTourVirtual;
    }

    public function getLinkhotsite(): ?string
    {
        return $this->linkHotsite;
    }

    public function setLinkhotsite(?string $linkHotsite): void
    {
        $this->linkHotsite = $linkHotsite;
    }

    public function getLinkcorretor(): ?string
    {
        return $this->linkCorretor;
    }

    public function setLinkcorretor(?string $linkCorretor): void
    {
        $this->linkCorretor = $linkCorretor;
    }

    public function getLinkappios(): ?string
    {
        return $this->linkAppIOS;
    }

    public function setLinkappios(?string $linkAppIOS): void
    {
        $this->linkAppIOS = $linkAppIOS;
    }

    public function getLinkappandroid(): ?string
    {
        return $this->linkAppAndroid;
    }

    public function setLinkappandroid(?string $linkAppAndroid): void
    {
        $this->linkAppAndroid = $linkAppAndroid;
    }

    public function getTipo(): ?Tipo
    {
        return $this->tipo;
    }

    public function setTipo(?Tipo $tipo): void
    {
        $this->tipo = $tipo;
    }


    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): void
    {
        $this->status = $status;
    }


    public function getImagemDestaque(): mixed
    {
        return $this->imagemDestaque;
    }

    public function setImagemDestaque(mixed $imagemDestaque): void
    {
        $this->imagemDestaque = $imagemDestaque;
    }


    public function getLogoImagem(): mixed
    {
        return $this->logoImagem;
    }

    public function setLogoImagem(mixed $logoImagem): void
    {
        $this->logoImagem = $logoImagem;
    }


    public function getImagemObraEntregue(): mixed
    {
        return $this->imagemObraEntregue;
    }

    public function setImagemObraEntregue(mixed $imagemObraEntregue): void
    {
        $this->imagemObraEntregue = $imagemObraEntregue;
    }


    public function getImagemFichaImovel(): mixed
    {
        return $this->imagemFichaImovel;
    }

    public function setImagemFichaImovel(mixed $imagemFichaImovel): void
    {
        $this->imagemFichaImovel = $imagemFichaImovel;
    }


    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function setTags(Collection $tags): void
    {
        $this->tags = $tags;
    }


    public function getImagemTourVirtual(): mixed
    {
        return $this->imagemTourVirtual;
    }

    public function setImagemTourVirtual(mixed $imagemTourVirtual): void
    {
        $this->imagemTourVirtual = $imagemTourVirtual;
    }



}