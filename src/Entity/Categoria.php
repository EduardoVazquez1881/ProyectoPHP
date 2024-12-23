<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
class Categoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $categoria_name = null;

    /**
     * @var Collection<int, JuegosDatosCategorias>
     */
    #[ORM\ManyToMany(targetEntity: JuegosDatosCategorias::class, mappedBy: 'categoria_ID')]
    private Collection $juegosDatosCategorias;

    public function __construct()
    {
        $this->juegosDatosCategorias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoriaName(): ?string
    {
        return $this->categoria_name;
    }

    public function setCategoriaName(string $categoria_name): static
    {
        $this->categoria_name = $categoria_name;

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
            $juegosDatosCategoria->addCategoriaID($this);
        }

        return $this;
    }

    public function removeJuegosDatosCategoria(JuegosDatosCategorias $juegosDatosCategoria): static
    {
        if ($this->juegosDatosCategorias->removeElement($juegosDatosCategoria)) {
            $juegosDatosCategoria->removeCategoriaID($this);
        }

        return $this;
    }
}
