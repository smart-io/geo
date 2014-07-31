<?php
namespace SmartData\SmartData;

use SmartData\SmartData\Airport\AirportRepository;
use SmartData\SmartData\Geolocation\GeolocationRepository;

class SmartData
{
    /**
     * @var string
     */
    private $storage;

    /**
     * @var AirportRepository
     */
    private $airportRepository;

    /**
     * @var GeolocationRepository
     */
    private $geolocationRepository;

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

    /**
     * @return GeolocationRepository
     */
    public function getGeolocationRepository()
    {
        if (null === $this->geolocationRepository) {
            $this->geolocationRepository = new GeolocationRepository();
        }
        return $this->geolocationRepository;
    }

    /**
     * @return string
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
        return $this;
    }
}
