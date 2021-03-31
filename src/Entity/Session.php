<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateDebute;

    /**
     * @ORM\Column(type="date")
     */
    private $duree;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateurs::class, inversedBy="sessions")
     */
    private $ids;

    public function __construct()
    {
        $this->ids = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebute(): ?\DateTimeInterface
    {
        return $this->DateDebute;
    }

    public function setDateDebute(?\DateTimeInterface $DateDebute): self
    {
        $this->DateDebute = $DateDebute;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection|Utilisateurs[]
     */
    public function getIds(): Collection
    {
        return $this->ids;
    }

    public function addId(Utilisateurs $id): self
    {
        if (!$this->ids->contains($id)) {
            $this->ids[] = $id;
        }

        return $this;
    }

    public function removeId(Utilisateurs $id): self
    {
        $this->ids->removeElement($id);

        return $this;
    }
}
