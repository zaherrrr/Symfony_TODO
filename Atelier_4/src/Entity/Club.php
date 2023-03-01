<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{

    #[ORM\Id]
    #[ORM\Column(length: 80)]
    private ?string $REF = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToMany(targetEntity: Student::class, mappedBy: 'clubs')]
    private Collection $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

   

    public function getREF(): ?string
    {
        return $this->REF;
    }

    public function setREF(string $REF): self
    {
        $this->REF = $REF;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->addClub($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            $student->removeClub($this);
        }

        return $this;
    }
    public function __toString(){
        return $this->REF;
    }
}
