<?php
namespace SmartData\SmartData;

use SmartData\SmartData\Airport\AirportRepository;

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
