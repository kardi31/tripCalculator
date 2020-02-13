<?php
declare(strict_types=1);

namespace App\Tests\Service;

use App\View\TripView;
use PHPUnit\Framework\TestCase;

class TripViewTest extends TestCase
{
    /**
     * @var TripView
     */
    private $view;

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

    public function setUp()
    {
        $this->name = 'Trip name';
        $this->distance = 15.9;
        $this->interval = 13;
        $this->avgSpeed = 150;
        $this->view = new TripView(
            $this->name,
            $this->distance,
            $this->interval,
            $this->avgSpeed
        );
    }

    public function testTripViewReturnsCorrectResults()
    {
        $this->assertEquals($this->name, $this->view->getName());
        $this->assertEquals($this->distance, $this->view->getDistance());
        $this->assertEquals($this->interval, $this->view->getInterval());
        $this->assertEquals($this->avgSpeed, $this->view->getAvgSpeed());
    }
}
