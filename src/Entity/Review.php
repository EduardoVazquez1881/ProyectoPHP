<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(nullable: true)]
    private ?int $calificacion = null;

    #[ORM\Column(nullable: true)]
    private ?int $dificultad = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    private ?User $usuario_id = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    private ?Juego $juego_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getCalificacion(): ?int
    {
        return $this->calificacion;
    }

    public function setCalificacion(?int $calificacion): static
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    public function getDificultad(): ?int
    {
        return $this->dificultad;
    }

    public function setDificultad(?int $dificultad): static
    {
        $this->dificultad = $dificultad;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getUsuarioId(): ?User
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(?User $usuario_id): static
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getJuegoId(): ?Juego
    {
        return $this->juego_id;
    }

    public function setJuegoId(?Juego $juego_id): static
    {
        $this->juego_id = $juego_id;

        return $this;
    }
}
