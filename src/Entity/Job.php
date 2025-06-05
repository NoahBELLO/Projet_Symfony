<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column]
    private ?bool $remote_allowed = null;

    #[ORM\Column]
    private ?float $salary_min = null;

    #[ORM\Column]
    private ?float $salary_max = null;

    #[ORM\ManyToOne(inversedBy: 'job')]
    private ?Compagny $compagny = null;

    #[ORM\ManyToOne(inversedBy: 'job')]
    private ?JobType $jobType = null;

    /**
     * @var Collection<int, JobApplication>
     */
    #[ORM\OneToMany(targetEntity: JobApplication::class, mappedBy: 'job')]
    private Collection $jobApplications;

    /**
     * @var Collection<int, JobCategorie>
     */
    #[ORM\ManyToMany(targetEntity: JobCategorie::class, mappedBy: 'job')]
    private Collection $jobCategories;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $releaseDate = null;

    public function __construct()
    {
        $this->jobApplications = new ArrayCollection();
        $this->jobCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function isRemoteAllowed(): ?bool
    {
        return $this->remote_allowed;
    }

    public function setRemoteAllowed(bool $remote_allowed): static
    {
        $this->remote_allowed = $remote_allowed;

        return $this;
    }

    public function getSalaryMin(): ?float
    {
        return $this->salary_min;
    }

    public function setSalaryMin(float $salary_min): static
    {
        $this->salary_min = $salary_min;

        return $this;
    }

    public function getSalaryMax(): ?float
    {
        return $this->salary_max;
    }

    public function setSalaryMax(float $salary_max): static
    {
        $this->salary_max = $salary_max;

        return $this;
    }

    public function getCompagny(): ?Compagny
    {
        return $this->compagny;
    }

    public function setCompagny(?Compagny $compagny): static
    {
        $this->compagny = $compagny;

        return $this;
    }

    public function getJobType(): ?JobType
    {
        return $this->jobType;
    }

    public function setJobType(?JobType $jobType): static
    {
        $this->jobType = $jobType;

        return $this;
    }

    /**
     * @return Collection<int, JobApplication>
     */
    public function getJobApplications(): Collection
    {
        return $this->jobApplications;
    }

    public function addJobApplication(JobApplication $jobApplication): static
    {
        if (!$this->jobApplications->contains($jobApplication)) {
            $this->jobApplications->add($jobApplication);
            $jobApplication->setJob($this);
        }

        return $this;
    }

    public function removeJobApplication(JobApplication $jobApplication): static
    {
        if ($this->jobApplications->removeElement($jobApplication)) {
            // set the owning side to null (unless already changed)
            if ($jobApplication->getJob() === $this) {
                $jobApplication->setJob(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JobCategorie>
     */
    public function getJobCategories(): Collection
    {
        return $this->jobCategories;
    }

    public function addJobCategory(JobCategorie $jobCategory): static
    {
        if (!$this->jobCategories->contains($jobCategory)) {
            $this->jobCategories->add($jobCategory);
            $jobCategory->addJob($this);
        }

        return $this;
    }

    public function removeJobCategory(JobCategorie $jobCategory): static
    {
        if ($this->jobCategories->removeElement($jobCategory)) {
            $jobCategory->removeJob($this);
        }

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeImmutable
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeImmutable $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }
}
