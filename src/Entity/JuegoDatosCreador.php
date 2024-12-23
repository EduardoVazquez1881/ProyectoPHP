<?php

namespace App\Entity;

use App\Repository\JuegoDatosCreadorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: JuegoDatosCreadorRepository::class)]
#[Broadcast]
class JuegoDatosCreador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Juego>
     */
    #[ORM\ManyToMany(targetEntity: Juego::class, inversedBy: 'juegoDatosCreadors')]
    private Collection $juego_id;

    /**
     * @var Collection<int, Creador>
     */
    #[ORM\ManyToMany(targetEntity: Creador::class, inversedBy: 'juegoDatosCreadors')]
    private Collection $creador_id;

    /**
     * @var Collection<int, JuegosDatosCategorias>
     */
    #[ORM\ManyToMany(targetEntity: JuegosDatosCategorias::class, mappedBy: 'juegosDatos_id')]
    private Collection $juegosDatosCategorias;

    /**
     * @var Collection<int, JuegosDatosPlataformas>
     */
    #[ORM\ManyToMany(targetEntity: JuegosDatosPlataformas::class, mappedBy: 'juegosdatos_id')]
    private Collection $juegosDatosPlataformas;

    public function __construct()
    {
        $this->juego_id = new ArrayCollection();
        $this->creador_id = new ArrayCollection();
        $this->juegosDatosCategorias = new ArrayCollection();
        $this->juegosDatosPlataformas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Juego>
     */
    public function getJuegoId(): Collection
    {
        return $this->juego_id;
    }

    public function addJuegoId(Juego $juegoId): static
    {
        if (!$this->juego_id->contains($juegoId)) {
            $this->juego_id->add($juegoId);
        }

        return $this;
    }

    public function removeJuegoId(Juego $juegoId): static
    {
        $this->juego_id->removeElement($juegoId);

        return $this;
    }

    /**
     * @return Collection<int, Creador>
     */
    public function getCreadorId(): Collection
    {
        return $this->creador_id;
    }

    public function addCreadorId(Creador $creadorId): static
    {
        if (!$this->creador_id->contains($creadorId)) {
            $this->creador_id->add($creadorId);
        }

        return $this;
    }

    public function removeCreadorId(Creador $creadorId): static
    {
        $this->creador_id->removeElement($creadorId);

        return $this;
    }

    /**
     * @return Collection<int, JuegosDatosCategorias>
     */
    public function getJuegosDatosCategorias(): Collection
    {
        return $this->juegosDatosCategorias;
    }

    public function addJuegosDatosCategoria(JuegosDatosCategorias $juegosDatosCategoria): static
    {
        if (!$this->juegosDatosCategorias->contains($juegosDatosCategoria)) {
            $this->juegosDatosCategorias->add($juegosDatosCategoria);
            $juegosDatosCategoria->addJuegosDatosId($this);
        }

        return $this;
    }

    public function removeJuegosDatosCategoria(JuegosDatosCategorias $juegosDatosCategoria): static
    {
        if ($this->juegosDatosCategorias->removeElement($juegosDatosCategoria)) {
            $juegosDatosCategoria->removeJuegosDatosId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, JuegosDatosPlataformas>
     */
    public function getJuegosDatosPlataformas(): Collection
    {
        return $this->juegosDatosPlataformas;
    }

    public function addJuegosDatosPlataforma(JuegosDatosPlataformas $juegosDatosPlataforma): static
    {
        if (!$this->juegosDatosPlataformas->contains($juegosDatosPlataforma)) {
            $this->juegosDatosPlataformas->add($juegosDatosPlataforma);
            $juegosDatosPlataforma->addJuegosdatosId($this);
        }

        return $this;
    }

    public function removeJuegosDatosPlataforma(JuegosDatosPlataformas $juegosDatosPlataforma): static
    {
        if ($this->juegosDatosPlataformas->removeElement($juegosDatosPlataforma)) {
            $juegosDatosPlataforma->removeJuegosdatosId($this);
        }

        return $this;
    }
}
