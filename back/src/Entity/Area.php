<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AreaRepository")
 */
class Area
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("api_v1_areas")
     * @Groups("api_v1_comment")
     * @Groups("api_v1_highways")
     * @Groups("api_v1_user")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("api_v1_areas")
     * @Groups("api_v1_comment")
     * @Groups("api_v1_highways")
     * @Groups("api_v1_user")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups("api_v1_areas")
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("api_v1_areas")
     */
    private $city;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @Groups("api_v1_areas")
     */
    private $kilometers;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6)
     * @Groups("api_v1_areas")
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6)
     * @Groups("api_v1_areas")
     */
    private $longitude;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**

     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="area", orphanRemoval=true)
     * @Groups("api_v1_areas")
     * @ORM\OrderBy({"createdAt" = "ASC"})
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GasStation", inversedBy="areas")
     * @Groups("api_v1_areas")
     */
    private $gasStation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GasPrice", mappedBy="area", orphanRemoval=true)
     * @Groups("api_v1_areas")
     */
    private $gasPrices;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Restaurant", mappedBy="areas")
     * @Groups("api_v1_areas")
     */
    private $restaurants;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Service", mappedBy="areas")
     * @Groups("api_v1_areas")
     */
    private $services;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Destination", mappedBy="areas")
     */
    private $destinations;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1, nullable=true)
     * @Groups("api_v1_areas")
     */
    private $averageRate;

    public function __construct()
    {
        $this->restaurants = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->gasPrices = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->destinations = new ArrayCollection();
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

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getKilometers(): ?string
    {
        return $this->kilometers;
    }

    public function setKilometers(string $kilometers): self
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setArea($this);
        }
      return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getArea() === $this) {
                $comment->setArea(null);
            }
        }
        return $this;
    }

    public function getGasStation(): ?GasStation
    {
        return $this->gasStation;
    }

    public function setGasStation(?GasStation $gasStation): self
    {
        $this->gasStation = $gasStation;

        return $this;
    }

    /**
     * @return Collection|GasPrice[]
     */
    public function getGasPrices(): Collection
    {
        return $this->gasPrices;
    }

    public function addGasPrice(GasPrice $gasPrice): self
    {
        if (!$this->gasPrices->contains($gasPrice)) {
            $this->gasPrices[] = $gasPrice;
            $gasPrice->setArea($this);
            }
      return $this;
    }

    public function removeGasPrice(GasPrice $gasPrice): self
    {
        if ($this->gasPrices->contains($gasPrice)) {
            $this->gasPrices->removeElement($gasPrice);
            // set the owning side to null (unless already changed)
            if ($gasPrice->getArea() === $this) {
                $gasPrice->setArea(null);
            }
        }
        return $this;
    }

     /**
     * @return Collection|Restaurant[]
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): self
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants[] = $restaurant;
            $restaurant->addArea($this);
        }
      return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): self
    {
        if ($this->restaurants->contains($restaurant)) {
            $this->restaurants->removeElement($restaurant);
            $restaurant->removeArea($this);
        }

        return $this;
    }
  
     /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->addArea($this);
        }

        return $this;
    }
  
    public function removeService(Service $service): self
    {
        if ($this->services->contains($service)) {
            $this->services->removeElement($service);
            $service->removeArea($this);
        }

        return $this;
    }

    /**
     * @return Collection|Destination[]
     * @Groups("api_v1_areas")
     */
    public function getDestinations(): Collection
    {
        return $this->destinations;
    }

    public function addDestination(Destination $destination): self
    {
        if (!$this->destinations->contains($destination)) {
            $this->destinations[] = $destination;
            $destination->addArea($this);
        }

        return $this;
    }

    public function removeDestination(Destination $destination): self
    {
        if ($this->destinations->contains($destination)) {
            $this->destinations->removeElement($destination);
            $destination->removeArea($this);
        }

        return $this;
    }

    public function getAverageRate(): ?string
    {
        return $this->averageRate;
    }

    public function setAverageRate(?string $averageRate): self
    {
        $this->averageRate = $averageRate;

        return $this;
    }

}


