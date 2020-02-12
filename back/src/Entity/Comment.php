<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("api_v1_areas")
     * @Groups("api_v1_comment")
     * @Groups("api_v1_user")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups("api_v1_areas")
     * @Groups("api_v1_comment")
     * @Groups("api_v1_user")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("api_v1_areas")
     * @Groups("api_v1_comment")
     * @Groups("api_v1_user")
     */
    private $picture;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups("api_v1_areas")
     * @Groups("api_v1_comment")
     * @Groups("api_v1_user")
     */
    private $rate;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("api_v1_areas")
     * @Groups("api_v1_user")
     * @Groups("api_v1_comment")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     */
    private $updatedAt;

    /**

     * @ORM\ManyToOne(targetEntity="App\Entity\Area", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(?int $rate): self
    {
        $this->rate = $rate;

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
     * @Groups("api_v1_comment")
     * @Groups("api_v1_user")
     */
    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;
      
        return $this;
    }

    /**
     * @Groups("api_v1_areas")
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
