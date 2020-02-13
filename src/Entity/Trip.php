<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TripRepository")
 * @ORM\Table(name="trips")
 */
class Trip
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotNull
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @var int
     * @Assert\NotNull
     * @ORM\Column(type="integer")
     */
    private $measureInterval;

    /**
     * @ORM\OneToMany(targetEntity="TripMeasure", mappedBy="trip")
     * @ORM\OrderBy({"distance" = "ASC"})
     */
    private $measures;

    public function __construct()
    {
        $this->measures = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    public function setMeasureInterval(int $measureInterval): void
    {
        $this->measureInterval = $measureInterval;
    }

    public function addMeasure(TripMeasure $measure): void
    {
        $this->measures[] = $measure;
    }

    /**
     * @return Collection|TripMeasure[]
     */
    public function getMeasures(): Collection
    {
        return $this->measures;
    }

    public function setMeasures(?TripMeasure $measures): self
    {
        $this->measures = $measures;

        return $this;
    }
}
