<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{

    #[ORM\Id]
    #[ORM\Column(length: 150)]
    private ?string $NSC = null;

    #[ORM\Column(length: 150)]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    private ?string $email = null;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'students')]
    #[ORM\JoinColumn(name:'student_nsc',referencedColumnName:'NSC')]
    #[ORM\InverseJoinColumn(name:"club_ref",referencedColumnName:'REF')]
    private Collection $clubs;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classroom $classroom = null;

    public function __construct()
    {
        $this->clubs = new ArrayCollection();
    }


    public function getNSC(): ?string
    {
        return $this->NSC;
    }

    public function setNSC(string $NSC): self
    {
        $this->NSC = $NSC;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClubs(): Collection
    {
        return $this->clubs;
    }

    public function addClub(Club $club): self
    {
        if (!$this->clubs->contains($club)) {
            $this->clubs->add($club);
        }

        return $this;
    }

    public function removeClub(Club $club): self
    {
        $this->clubs->removeElement($club);

        return $this;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }
}
