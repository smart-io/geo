<?php
namespace SmartData\SmartData;

use SmartData\SmartData\Airport\AirportRepository;

class SmartData
{
    /**
     * @var AirportRepository
     */
    private $airportRepository;

    /**
     * @return AirportRepository
     */
    public function getAirportRepository()
    {
        if (null === $this->airportRepository) {
            $this->airportRepository = new AirportRepository();
        }
        return $this->airportRepository;
    }
}
