<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * County
 *
 * @ORM\Table(name="county")
 * @ORM\Entity(repositoryClass="App\Repository\CountyRepository")
 */
class County
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
     * @var int
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=false)
     */
    private $zipcode;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Traobject", mappedBy="county")
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

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

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

}
