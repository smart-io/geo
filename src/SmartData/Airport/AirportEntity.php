<?php
namespace SmartData\SmartData\Airport;

class AirportEntity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryName;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $cityCode;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var int
     */
    private $altitude;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var string
     */
    private $dst;

    /**
     * @var bool
     */
    private $isCity;

    /**
     * @var bool
     */
    private $isMajorAirport;

    /**
     * @var int
     */
    private $popularityTier;

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
}
