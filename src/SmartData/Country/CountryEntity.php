<?php
namespace SmartData\SmartData\Country;

use JsonSerializable;
use League\Geotools\Coordinate\Coordinate;
use SmartData\SmartData\Coordinate\CoordinateCollectionInterface;
use SmartData\SmartData\Coordinate\CoordinateLogic;
use SmartData\SmartData\Country\CountryName\CountryNameCollection;

class CountryEntity extends CoordinateLogic implements JsonSerializable, CoordinateCollectionInterface
{
    /**
     * @var Coordinate
     */
    protected $coordinate;

    /**
     * @var CountryNameCollection
     */
    protected $names;

    /**
     * @var string
     */
    protected $shortCode;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $continent;

    /**
     * @var string
     */
    protected $population;

    /**
     * @var string
     */
    protected $area;

    /**
     * @var string
     */
    protected $capital;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var string
     */
    protected $north;

    /**
     * @var string
     */
    protected $east;

    /**
     * @var string
     */
    protected $south;

    /**
     * @var string
     */
    protected $west;

    public function __construct()
    {
        $this->coordinate = new Coordinate([
            $this->latitude,
            $this->longitude
        ]);
        $this->setNames(new CountryNameCollection());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'names' => $this->getNames(),
            'short_code' => $this->getShortCode(),
            'code' => $this->getCode(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'currency' => $this->getCurrency(),
            'continent' => $this->getContinent(),
            'population' => $this->getPopulation(),
            'area' => $this->getArea(),
            'capital' => $this->getCapital(),
            'timezone' => $this->getTimezone(),
            'north' => $this->getNorth(),
            'east' => $this->getEast(),
            'south' => $this->getSouth(),
            'west' => $this->getWest()
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }

    /**
     * @param Coordinate $coordinate
     * @return $this
     */
    public function setCoordinate(Coordinate $coordinate)
    {
        $this->coordinate = $coordinate;
        return $this;
    }

    /**
     * @return CountryNameCollection
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param CountryNameCollection $names
     * @return $this
     */
    public function setNames(CountryNameCollection $names)
    {
        $this->names = $names;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * @param string $shortCode
     * @return $this
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * @param string $continent
     * @return $this
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;
        return $this;
    }

    /**
     * @return string
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param string $population
     * @return $this
     */
    public function setPopulation($population)
    {
        $this->population = $population;
        return $this;
    }

    /**
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param string $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param string $capital
     * @return $this
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return $this
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return string
     */
    public function getNorth()
    {
        return $this->north;
    }

    /**
     * @param string $north
     * @return $this
     */
    public function setNorth($north)
    {
        $this->north = $north;
        return $this;
    }

    /**
     * @return string
     */
    public function getEast()
    {
        return $this->east;
    }

    /**
     * @param string $east
     * @return $this
     */
    public function setEast($east)
    {
        $this->east = $east;
        return $this;
    }

    /**
     * @return string
     */
    public function getSouth()
    {
        return $this->south;
    }

    /**
     * @param string $south
     * @return $this
     */
    public function setSouth($south)
    {
        $this->south = $south;
        return $this;
    }

    /**
     * @return string
     */
    public function getWest()
    {
        return $this->west;
    }

    /**
     * @param string $west
     * @return $this
     */
    public function setWest($west)
    {
        $this->west = $west;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function normalizeLatitude($latitude)
    {
        return $this->coordinate->normalizeLatitude($latitude);
    }

    /**
     * {@inheritdoc}
     */
    public function normalizeLongitude($longitude)
    {
        return $this->coordinate->normalizeLongitude($longitude);
    }

    /**
     * {@inheritdoc}
     */
    public function getEllipsoid()
    {
        return $this->coordinate->getEllipsoid();
    }
}
