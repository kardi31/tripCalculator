<?php
declare(strict_types=1);

namespace App\View;

class TripView
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var int
     */
    private $interval;

    /**
     * @var int
     */
    private $avgSpeed;

    /**
     * @param string $name
     * @param float $distance
     * @param int $interval
     * @param int $avgSpeed
     */
    public function __construct(string $name, float $distance, int $interval, int $avgSpeed)
    {
        $this->name = $name;
        $this->distance = $distance;
        $this->interval = $interval;
        $this->avgSpeed = $avgSpeed;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function getInterval(): int
    {
        return $this->interval;
    }

    public function getAvgSpeed(): int
    {
        return $this->avgSpeed;
    }
}
