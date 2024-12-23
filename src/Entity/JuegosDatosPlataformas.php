<?php

namespace App\Entity;

use App\Repository\JuegosDatosPlataformasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuegosDatosPlataformasRepository::class)]
class JuegosDatosPlataformas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, JuegoDatosCreador>
     */
    #[ORM\ManyToMany(targetEntity: JuegoDatosCreador::class, inversedBy: 'juegosDatosPlataformas')]
    private Collection $juegosdatos_id;

    /**
     * @var Collection<int, Plataforma>
     */
    #[ORM\ManyToMany(targetEntity: Plataforma::class, inversedBy: 'juegosDatosPlataformas')]
    private Collection $plataforma_id;

    public function __construct()
    {
        $this->juegosdatos_id = new ArrayCollection();
        $this->plataforma_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, JuegoDatosCreador>
     */
    public function getJuegosdatosId(): Collection
    {
        return $this->juegosdatos_id;
    }

    public function addJuegosdatosId(JuegoDatosCreador $juegosdatosId): static
    {
        if (!$this->juegosdatos_id->contains($juegosdatosId)) {
            $this->juegosdatos_id->add($juegosdatosId);
        }

        return $this;
    }

    public function removeJuegosdatosId(JuegoDatosCreador $juegosdatosId): static
    {
        $this->juegosdatos_id->removeElement($juegosdatosId);

        return $this;
    }

    /**
     * @return Collection<int, Plataforma>
     */
    public function getPlataformaId(): Collection
    {
        return $this->plataforma_id;
    }

    public function addPlataformaId(Plataforma $plataformaId): static
    {
        if (!$this->plataforma_id->contains($plataformaId)) {
            $this->plataforma_id->add($plataformaId);
        }

        return $this;
    }

    public function removePlataformaId(Plataforma $plataformaId): static
    {
        $this->plataforma_id->removeElement($plataformaId);

        return $this;
    }
}
