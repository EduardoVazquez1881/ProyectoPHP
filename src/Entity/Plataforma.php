<?php

namespace App\Entity;

use App\Repository\PlataformaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlataformaRepository::class)]
class Plataforma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $plataforma_name = null;

    /**
     * @var Collection<int, JuegosDatosPlataformas>
     */
    #[ORM\ManyToMany(targetEntity: JuegosDatosPlataformas::class, mappedBy: 'plataforma_id')]
    private Collection $juegosDatosPlataformas;

    public function __construct()
    {
        $this->juegosDatosPlataformas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlataformaName(): ?string
    {
        return $this->plataforma_name;
    }

    public function setPlataformaName(string $plataforma_name): static
    {
        $this->plataforma_name = $plataforma_name;

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
            $juegosDatosPlataforma->addPlataformaId($this);
        }

        return $this;
    }

    public function removeJuegosDatosPlataforma(JuegosDatosPlataformas $juegosDatosPlataforma): static
    {
        if ($this->juegosDatosPlataformas->removeElement($juegosDatosPlataforma)) {
            $juegosDatosPlataforma->removePlataformaId($this);
        }

        return $this;
    }
}
