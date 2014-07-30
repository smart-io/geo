<?php
namespace SmartData\SmartData\Airport;

class AirportRepository
{
    /**
     * @var AirportCollection
     */
    private $elements;

    /**
     * @var AirportMapper
     */
    private $mapper;

    /**
     * @return AirportCollection
     */
    public function findAll()
    {
        if (null === $this->elements) {
            $this->elements = $this->getMapper()->loadCollection();
        }
        return $this->elements;
    }

    /**
     * @return AirportMapper
     */
    private function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = new AirportMapper();
        }
        return $this->mapper;
    }
}
