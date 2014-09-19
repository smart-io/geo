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
    private $coordinate;

    /**
     * @var CountryNameCollection
     */
    private $names;

    /**
     * @var string
     */
    private $shortCode;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $boundariesNortheastLatitude;

    /**
     * @var string
     */
    private $boundariesNortheastLongitude;

    /**
     * @var string
     */
    private $boundariesSouthwestLatitude;

    /**
     * @var string
     */
    private $boundariesSouthwestLongitude;

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
    public function jsonSerialize()
    {
        return [
            'names' => $this->getNames(),
            'shortCode' => $this->getShortCode(),
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
