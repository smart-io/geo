<?php
namespace SmartData\SmartData\Airport;

use JsonSerializable;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Coordinate\CoordinateInterface;

class AirportEntity implements JsonSerializable, CoordinateInterface
{
    /**
     * @var Coordinate
     */
    protected $coordinate;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $countryName;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $cityCode;

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @var int
     */
    protected $altitude;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var string
     */
    protected $dst;

    /**
     * @var bool
     */
    protected $isCity;

    /**
     * @var bool
     */
    protected $isMajorAirport;

    /**
     * @var int
     */
    protected $popularityTier;

    public function __construct()
    {
        $this->coordinate = new Coordinate([
            $this->latitude,
            $this->longitude
        ]);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'city' => $this->getCity(),
            'countryName' => $this->getCountryName(),
            'countryCode' => $this->getCountryCode(),
            'code' => $this->getCode(),
            'cityCode' => $this->getCityCode(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'altitude' => $this->getAltitude(),
            'timezone' => $this->getTimezone(),
            'dst' => $this->getDst(),
            'isCity' => $this->isCity(),
            'isMajorAirport' => $this->isMajorAirport(),
            'popularityTier' => $this->getPopularityTier()
        ];
    }

    /**
     * @return int
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * @param int $altitude
     * @return $this
     */
    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * @param string $cityCode
     * @return $this
     */
    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;
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
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     * @return $this
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDst()
    {
        return $this->dst;
    }

    /**
     * @param string $dst
     * @return $this
     */
    public function setDst($dst)
    {
        $this->dst = $dst;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCity()
    {
        return $this->isCity;
    }

    /**
     * @param bool $isCity
     * @return $this
     */
    public function setIsCity($isCity)
    {
        $this->isCity = $isCity;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMajorAirport()
    {
        return $this->isMajorAirport;
    }

    /**
     * @param bool $isMajorAirport
     * @return $this
     */
    public function setIsMajorAirport($isMajorAirport)
    {
        $this->isMajorAirport = $isMajorAirport;
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
        $this->coordinate->setLatitude($this->latitude);
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
        $this->coordinate->setLongitude($this->longitude);
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPopularityTier()
    {
        return $this->popularityTier;
    }

    /**
     * @param int $popularityTier
     * @return $this
     */
    public function setPopularityTier($popularityTier)
    {
        $this->popularityTier = $popularityTier;
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
