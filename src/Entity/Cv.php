<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CvRepository::class)
 */
class Cv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formations;

    /**
     * @ORM\Column(type="string", length=254, nullable=true)
     */
    private $langues;

    /**
     * @ORM\Column(type="string", length=254, nullable=true)
     */
    private $diplome;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateurs::class, inversedBy="cv", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idcandidat;

    

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $interets;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competences;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experience;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormations(): ?string
    {
        return $this->formations;
    }

    public function setFormations(?string $formations): self
    {
        $this->formations = $formations;

        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->langues;
    }

    public function setLangues(?string $langues): self
    {
        $this->langues = $langues;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getIdcandidat(): ?Utilisateurs
    {
        return $this->idcandidat;
    }

    public function setIdcandidat(Utilisateurs $idcandidat): self
    {
        $this->idcandidat = $idcandidat;

        return $this;
    }

   
    public function getInterets(): ?string
    {
        return $this->interets;
    }

    public function setInterets(?string $interets): self
    {
        $this->interets = $interets;

        return $this;
    }

    public function getCompetences(): ?string
    {
        return $this->competences;
    }

    public function setCompetences(?string $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }
}
