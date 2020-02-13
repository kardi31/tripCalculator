<?php
declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Trip;
use App\Entity\TripMeasure;
use App\Service\TripCalculator;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class TripCalculatorTest extends TestCase
{
    /**
     * @var TripCalculator
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new TripCalculator();
    }

    public function testCalculateTripMeasuresReturnCorrectData()
    {
        $name = 'Trip 35';
        $measureInterval = 15;
        $distance1 = 7.13;
        $distance2 = 10.05;
        $distance3 = 13.03;
        $measure1 = $this->prepareMeasure($distance1);
        $measure2 = $this->prepareMeasure($distance2);
        $measure3 = $this->prepareMeasure($distance3);

        $measures = new ArrayCollection([$measure1, $measure2, $measure3]);
        $trip = $this->createMock(Trip::class);
        $trip->expects($this->once())
            ->method('getMeasures')
            ->willReturn($measures);
        $trip->expects($this->once())
            ->method('getName')
            ->willReturn($name);
        $trip->expects($this->once())
            ->method('getMeasureInterval')
            ->willReturn($measureInterval);

        $results = $this->calculator->calculateTripMeasures([$trip]);
        $this->assertIsArray($results);
        $this->assertArrayHasKey(0, $results);

        $result = $results [0];

        $expectedHighestAvgSpeed = 715;

        $this->assertEquals($name, $result->getName());
        $this->assertEquals($distance3, $result->getDistance());
        $this->assertEquals($measureInterval, $result->getInterval());
        $this->assertEquals($expectedHighestAvgSpeed, $result->getAvgSpeed());
    }

    private function prepareMeasure(float $distance)
    {
        $measure = $this->createMock(TripMeasure::class);
        $measure
            ->expects($this->atLeastOnce())
            ->method('getDistance')
            ->willReturn($distance);

        return $measure;
    }
}
