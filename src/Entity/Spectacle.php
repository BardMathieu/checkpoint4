<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpectacleRepository")
 */
class Spectacle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $place;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixp12;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixm12;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixgroup;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixschool;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(?int $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getPrixp12(): ?int
    {
        return $this->prixp12;
    }

    public function setPrixp12(int $prixp12): self
    {
        $this->prixp12 = $prixp12;

        return $this;
    }

    public function getPrixm12(): ?int
    {
        return $this->prixm12;
    }

    public function setPrixm12(int $prixm12): self
    {
        $this->prixm12 = $prixm12;

        return $this;
    }

    public function getPrixgroup(): ?int
    {
        return $this->prixgroup;
    }

    public function setPrixgroup(int $prixgroup): self
    {
        $this->prixgroup = $prixgroup;

        return $this;
    }

    public function getPrixschool(): ?int
    {
        return $this->prixschool;
    }

    public function setPrixschool(int $prixschool): self
    {
        $this->prixschool = $prixschool;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }
}
