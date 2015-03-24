<?php

namespace Smart\Geo\Geolocation;

use JsonSerializable;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Coordinate\CoordinateInterface;
use Smart\Geo\Coordinate\CoordinateLogic;
use Smart\Geo\Country\CountryEntity;
use Smart\Geo\Geo;
use Smart\Geo\Region\RegionEntity;

class GeolocationEntity extends CoordinateLogic implements JsonSerializable, CoordinateInterface
{
    const SOURCE_IP = 'ip';
    const SOURCE_HTML5 = 'html5';
    const SOURCE_POSTAL_CODE = 'postal_code';

    /**
     * @var Coordinate
     */
    protected $coordinate;

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
    protected $accuracy;

    /**
     * @var CountryEntity
     */
    protected $country;

    /**
     * @var string
     */
    protected $unmappedCountry;

    /**
     * @var RegionEntity
     */
    protected $region;

    /**
     * @var string
     */
    protected $unmappedRegion;

    /**
     * @var string
     */
    protected $source;

    public function __construct()
    {
        $this->createCoordinate();
    }

    public function createCoordinate()
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
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'source' => $this->getSource(),
            'accuracy' => $this->getAccuracy(),
            'country' => $this->getCountry(),
            'region' => $this->getRegion(),
        ];
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
        $latitude = filter_var($latitude, FILTER_SANITIZE_STRING);
        if (preg_match('/^[\-|+]?[\d]{0,3}(\.[\d]*)?$/', $latitude) && $latitude >= -85 && $latitude <= 85) {
            $this->latitude = bcadd($latitude, 0, 14);
        } else {
            $this->latitude = null;
        }

        if (null === $this->coordinate) {
            $this->createCoordinate();
        }

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
        $longitude = filter_var($longitude, FILTER_SANITIZE_STRING);
        if (preg_match('/^[\-|+]?[\d]{0,3}(\.[\d]*)?$/', $longitude) && $longitude >= -180 && $longitude <= 180) {
            $this->longitude = bcadd($longitude, 0, 14);
        } else {
            $this->longitude = null;
        }

        if (null === $this->coordinate) {
            $this->createCoordinate();
        }

        $this->coordinate->setLongitude($this->longitude);
        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return $this
     */
    public function setSource($source)
    {
        if ($source === self::SOURCE_IP || $source === self::SOURCE_HTML5 || $source === self::SOURCE_POSTAL_CODE) {
            $this->source = $source;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

    /**
     * @param string $accuracy
     * @return $this
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = (int)$accuracy;
        return $this;
    }

    /**
     * @return CountryEntity
     */
    public function getCountry()
    {
        if (null !== $this->unmappedCountry && null === $this->country) {
            $this->country = Geo::getCountryRepository()->findByShortCode($this->unmappedCountry);
        }
        return $this->country;
    }

    /**
     * @param CountryEntity|string $country
     * @return $this
     */
    public function setCountry($country)
    {
        if (is_string($country)) {
            $this->unmappedCountry = $country;
        } else {
            $this->country = $country;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getUnmappedCountry()
    {
        return $this->unmappedCountry;
    }

    /**
     * @param string $unmappedCountry
     * @return $this
     */
    public function setUnmappedCountry($unmappedCountry)
    {
        $this->unmappedCountry = $unmappedCountry;
        return $this;
    }

    /**
     * @return RegionEntity
     */
    public function getRegion()
    {
        if (null !== $this->unmappedRegion && null === $this->region) {
            $this->region = Geo::getRegionRepository()->findByCode($this->unmappedRegion);
        }
        return $this->region;
    }

    /**
     * @param RegionEntity|string $region
     * @return $this
     */
    public function setRegion($region)
    {
        if (is_string($region)) {
            $this->unmappedRegion = $region;
        } else {
            $this->region = $region;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getUnmappedRegion()
    {
        return $this->unmappedRegion;
    }

    /**
     * @param string $unmappedRegion
     * @return $this
     */
    public function setUnmappedRegion($unmappedRegion)
    {
        $this->unmappedRegion = $unmappedRegion;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function normalizeLatitude($latitude)
    {
       if (null === $this->coordinate) {
            $this->createCoordinate();
        }

        return $this->coordinate->normalizeLatitude($latitude);
    }

    /**
     * {@inheritdoc}
     */
    public function normalizeLongitude($longitude)
    {
        if (null === $this->coordinate) {
            $this->createCoordinate();
        }
        
        return $this->coordinate->normalizeLongitude($longitude);
    }

    /**
     * {@inheritdoc}
     */
    public function getEllipsoid()
    {
        if (null === $this->coordinate) {
            $this->createCoordinate();
        }

        return $this->coordinate->getEllipsoid();
    }
}
