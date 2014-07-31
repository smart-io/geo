<?php
namespace SmartData\SmartData;

use SmartData\SmartData\Airport\AirportRepository;
use SmartData\SmartData\Geolocation\GeolocationRepository;
use SmartData\SmartData\Ip\IpRepository;

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
     * @var IpRepository
     */
    private $ipRepository;

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
     * @return IpRepository
     */
    public function getIpRepository()
    {
        if (null === $this->ipRepository) {
            $this->ipRepository = new IpRepository();
        }
        return $this->ipRepository;
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
