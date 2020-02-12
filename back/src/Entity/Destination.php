<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="App\Repository\DestinationRepository")
 */
class Destination
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("api_v1_highways")
     * @Groups("api_v1_areas")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("api_v1_highways")
     * @Groups("api_v1_areas")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Area", inversedBy="destinations")
     * @Groups("api_v1_highways")
     */
    private $areas;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Highway", inversedBy="destinations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $highways;

    public function __construct()
    {
        $this->areas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Area[]
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    public function addArea(Area $area): self
    {
        if (!$this->areas->contains($area)) {
            $this->areas[] = $area;
        }

        return $this;
    }

    public function removeArea(Area $area): self
    {
        if ($this->areas->contains($area)) {
            $this->areas->removeElement($area);
        }

        return $this;
    }

    /**
     * @Groups("api_v1_areas")
     * @Groups("api_v1_highways")
     */
    public function getHighways(): ?Highway
    {
        return $this->highways;
    }

    public function setHighways(?Highway $highways): self
    {
        $this->highways = $highways;

        return $this;
    }
}