<?php

namespace App\Entity;

use App\Repository\CreadorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreadorRepository::class)]
class Creador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $creador_name = null;

    /**
     * @var Collection<int, JuegoDatosCreador>
     */
    #[ORM\ManyToMany(targetEntity: JuegoDatosCreador::class, mappedBy: 'creador_id')]
    private Collection $juegoDatosCreadors;

    public function __construct()
    {
        $this->juegoDatosCreadors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreadorName(): ?string
    {
        return $this->creador_name;
    }

    public function setCreadorName(string $creador_name): static
    {
        $this->creador_name = $creador_name;

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
            $juegoDatosCreador->addCreadorId($this);
        }

        return $this;
    }

    public function removeJuegoDatosCreador(JuegoDatosCreador $juegoDatosCreador): static
    {
        if ($this->juegoDatosCreadors->removeElement($juegoDatosCreador)) {
            $juegoDatosCreador->removeCreadorId($this);
        }

        return $this;
    }
}
