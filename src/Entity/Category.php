<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=false)
     */
    private $color;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Traobject", mappedBy="category")
     */
    private $traobjects;

    public function __construct() {
        $this->traobjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getTraobjects(): Collection
    {
        return $this->traobjects;
    }

    /**
     * @param Collection $traobjects
     */
    public function setTraobjects(Collection $traobjects): void
    {
        $this->traobjects = $traobjects;
    }

    public function __toString()
    {
        return $this->getLabel();
    }

    public function addTraobject(Traobject $traobject): self
    {
        if (!$this->traobjects->contains($traobject)) {
            $this->traobjects[] = $traobject;
            $traobject->setCategory($this);
        }

        return $this;
    }

    public function removeTraobject(Traobject $traobject): self
    {
        if ($this->traobjects->contains($traobject)) {
            $this->traobjects->removeElement($traobject);
            // set the owning side to null (unless already changed)
            if ($traobject->getCategory() === $this) {
                $traobject->setCategory(null);
            }
        }

        return $this;
    }


}
