<?php
namespace SmartData\SmartData\Region;

use JsonSerializable;
use League\Geotools\Coordinate\Coordinate;
use SmartData\SmartData\Coordinate\CoordinateCollectionInterface;
use SmartData\SmartData\Coordinate\CoordinateLogic;
use SmartData\SmartData\Region\RegionName\RegionNameCollection;
use SmartData\SmartData\Country\CountryEntity;
use SmartData\SmartData\Region\Type\TypeInterface;

class RegionEntity extends CoordinateLogic implements JsonSerializable, CoordinateCollectionInterface
{
    /**
     * @var Coordinate
     */
    protected $coordinate;

    /**
     * @var RegionNameCollection
     */
    protected $names;

    /**
     * @var CountryEntity
     */
    protected $country;

    /**
     * @var string
     */
    protected $unmappedCountry;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var TypeInterface
     */
    protected $type;

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
    protected $boundariesNortheastLatitude;

    /**
     * @var string
     */
    protected $boundariesNortheastLongitude;

    /**
     * @var string
     */
    protected $boundariesSouthwestLatitude;

    /**
     * @var string
     */
    protected $boundariesSouthwestLongitude;

    public function __construct()
    {
        $this->coordinate = new Coordinate([
            $this->latitude,
            $this->longitude
        ]);
        $this->setNames(new RegionNameCollection());
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'names' => $this->getNames(),
            'code' => $this->getCode(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'boundariesNortheastLatitude' => $this->getBoundariesNortheastLatitude(),
            'boundariesNortheastLongitude' => $this->getBoundariesNortheastLongitude(),
            'boundariesSouthwestLatitude' => $this->getBoundariesSouthwestLatitude(),
            'boundariesSouthwestLongitude' => $this->getBoundariesSouthwestLongitude()
        ];
    }

    /**
     * @return string
     */
    public function getBoundariesNortheastLatitude()
    {
        return $this->boundariesNortheastLatitude;
    }

    /**
     * @param string $boundariesNortheastLatitude
     * @return $this
     */
    public function setBoundariesNortheastLatitude($boundariesNortheastLatitude)
    {
        $this->boundariesNortheastLatitude = $boundariesNortheastLatitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoundariesNortheastLongitude()
    {
        return $this->boundariesNortheastLongitude;
    }

    /**
     * @param string $boundariesNortheastLongitude
     * @return $this
     */
    public function setBoundariesNortheastLongitude($boundariesNortheastLongitude)
    {
        $this->boundariesNortheastLongitude = $boundariesNortheastLongitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoundariesSouthwestLatitude()
    {
        return $this->boundariesSouthwestLatitude;
    }

    /**
     * @param string $boundariesSouthwestLatitude
     * @return $this
     */
    public function setBoundariesSouthwestLatitude($boundariesSouthwestLatitude)
    {
        $this->boundariesSouthwestLatitude = $boundariesSouthwestLatitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoundariesSouthwestLongitude()
    {
        return $this->boundariesSouthwestLongitude;
    }

    /**
     * @param string $boundariesSouthwestLongitude
     * @return $this
     */
    public function setBoundariesSouthwestLongitude($boundariesSouthwestLongitude)
    {
        $this->boundariesSouthwestLongitude = $boundariesSouthwestLongitude;
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
     * @return RegionNameCollection
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param RegionNameCollection $names
     * @return $this
     */
    public function setNames(RegionNameCollection $names)
    {
        $this->names = $names;
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
