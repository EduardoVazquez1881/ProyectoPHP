<?php

namespace App\Entity;

use App\Repository\JuegosDatosCategoriasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: JuegosDatosCategoriasRepository::class)]
#[Broadcast]
class JuegosDatosCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, JuegoDatosCreador>
     */
    #[ORM\ManyToMany(targetEntity: JuegoDatosCreador::class, inversedBy: 'juegosDatosCategorias')]
    private Collection $juegosDatos_id;

    /**
     * @var Collection<int, Categoria>
     */
    #[ORM\ManyToMany(targetEntity: Categoria::class, inversedBy: 'juegosDatosCategorias')]
    private Collection $categoria_ID;

    public function __construct()
    {
        $this->juegosDatos_id = new ArrayCollection();
        $this->categoria_ID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, JuegoDatosCreador>
     */
    public function getJuegosDatosId(): Collection
    {
        return $this->juegosDatos_id;
    }

    public function addJuegosDatosId(JuegoDatosCreador $juegosDatosId): static
    {
        if (!$this->juegosDatos_id->contains($juegosDatosId)) {
            $this->juegosDatos_id->add($juegosDatosId);
        }

        return $this;
    }

    public function removeJuegosDatosId(JuegoDatosCreador $juegosDatosId): static
    {
        $this->juegosDatos_id->removeElement($juegosDatosId);

        return $this;
    }

    /**
     * @return Collection<int, Categoria>
     */
    public function getCategoriaID(): Collection
    {
        return $this->categoria_ID;
    }

    public function addCategoriaID(Categoria $categoriaID): static
    {
        if (!$this->categoria_ID->contains($categoriaID)) {
            $this->categoria_ID->add($categoriaID);
        }

        return $this;
    }

    public function removeCategoriaID(Categoria $categoriaID): static
    {
        $this->categoria_ID->removeElement($categoriaID);

        return $this;
    }
}
