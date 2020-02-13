<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Trip;
use App\Entity\TripMeasure;
use App\View\TripView;

class TripCalculator
{
    /**
     * @param Trip[] $trips
     *
     * @return TripView[]
     */
    public function calculateTripMeasures(array $trips): array
    {
        $tripMeasurements = [];
        /** @var Trip $trip */
        foreach ($trips as $trip) {
            $tripMeasurements[] = $this->calculateMeasurementForTrip($trip);
        }

        return $tripMeasurements;
    }

    private function calculateMeasurementForTrip(Trip $trip): TripView
    {
        $totalDistance = 0;

        $measures = $trip->getMeasures()->toArray();
        $averageSpeeds = [];
        $measureInterval = $trip->getMeasureInterval();
        /**
         * @var int $key
         * @var TripMeasure $measure
         */
        foreach ($measures as $key => $measure) {
            if (!isset($measures[$key + 1])) {
                $averageSpeeds[] = 0;
                $totalDistance = $measure->getDistance();
                continue;
            }

            $currentDistance = $measure->getDistance();
            $nextSectionDistance = $measures[$key + 1]->getDistance();

            $averageSpeeds[] =
                Calculator::div(
                    Calculator::mul(
                        3600,
                        abs(
                            Calculator::sub(
                                $currentDistance,
                                $nextSectionDistance
                            )
                        )
                    ),
                    $measureInterval
                );
        }

        $highestAverageSpeed = intval(floor(max($averageSpeeds)));

        return new TripView(
            $trip->getName(),
            $totalDistance,
            $measureInterval,
            $highestAverageSpeed
        );
    }
}
