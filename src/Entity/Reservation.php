<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $spectacleId;

    /**
     * @ORM\Column(type="integer")
     */
    private $UserId;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbpersonne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $archive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpectacleId(): ?int
    {
        return $this->spectacleId;
    }

    public function setSpectacleId(int $spectacleId): self
    {
        $this->spectacleId = $spectacleId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->UserId;
    }

    public function setUserId(int $UserId): self
    {
        $this->UserId = $UserId;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getNbpersonne(): ?int
    {
        return $this->nbpersonne;
    }

    public function setNbpersonne(int $nbpersonne): self
    {
        $this->nbpersonne = $nbpersonne;

        return $this;
    }

    public function getArchive(): ?int
    {
        return $this->archive;
    }

    public function setArchive(?int $archive): self
    {
        $this->archive = $archive;

        return $this;
    }
}
