<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="trip_measures")
 */
class TripMeasure
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Trip
     * @Orm\ManyToOne(targetEntity="Trip", inversedBy="measures")
     * @Orm\JoinColumn(name="trip_id", referencedColumnName="id")
     */
    private $trip;

    /**
     * @var float
     * @Assert\NotNull
     * @ORM\Column(type="decimal", scale=2, precision=5)
     */
    private $distance;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTrip(): Trip
    {
        return $this->trip;
    }

    public function setTrip(Trip $trip): void
    {
        $this->trip = $trip;
    }

    public function getDistance(): float
    {
        return floatval($this->distance);
    }

    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }
}
