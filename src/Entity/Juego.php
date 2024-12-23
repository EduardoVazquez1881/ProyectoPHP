<?php

namespace App\Entity;

use App\Repository\JuegoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuegoRepository::class)]
class Juego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre_juego = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $precio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_creacion = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $imagen = null;

    #[ORM\Column(nullable: true)]
    private ?int $visitas = null;

    /**
     * @var Collection<int, Review>
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'juego_id')]
    private Collection $reviews;

    /**
     * @var Collection<int, JuegoDatosCreador>
     */
    #[ORM\ManyToMany(targetEntity: JuegoDatosCreador::class, mappedBy: 'juego_id')]
    private Collection $juegoDatosCreadors;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->juegoDatosCreadors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreJuego(): ?string
    {
        return $this->nombre_juego;
    }

    public function setNombreJuego(string $nombre_juego): static
    {
        $this->nombre_juego = $nombre_juego;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): static
    {
        $this->precio = $precio;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fecha_creacion): static
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): static
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getVisitas(): ?int
    {
        return $this->visitas;
    }

    public function setVisitas(?int $visitas): static
    {
        $this->visitas = $visitas;

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setJuegoId($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getJuegoId() === $this) {
                $review->setJuegoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JuegoDatosCreador>
     */
    public function getJuegoDatosCreadors(): Collection
    {
        return $this->juegoDatosCreadors;
    }

    public function addJuegoDatosCreador(JuegoDatosCreador $juegoDatosCreador): static
    {
        if (!$this->juegoDatosCreadors->contains($juegoDatosCreador)) {
            $this->juegoDatosCreadors->add($juegoDatosCreador);
            $juegoDatosCreador->addJuegoId($this);
        }

        return $this;
    }

    public function removeJuegoDatosCreador(JuegoDatosCreador $juegoDatosCreador): static
    {
        if ($this->juegoDatosCreadors->removeElement($juegoDatosCreador)) {
            $juegoDatosCreador->removeJuegoId($this);
        }

        return $this;
    }
}
