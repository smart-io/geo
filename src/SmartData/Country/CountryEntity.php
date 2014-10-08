<?php
namespace SmartData\SmartData\Geolocation;

use JsonSerializable;
use League\Geotools\Coordinate\Coordinate;
use SmartData\SmartData\Coordinate\CoordinateCollectionInterface;
use SmartData\SmartData\Coordinate\CoordinateLogic;

class CountryEntity extends CoordinateLogic implements JsonSerializable, CoordinateCollectionInterface
{
    /**
     * @var Coordinate
     */
    private $coordinate;

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
    private $name;

    /**
     * @var string
     */
    private $code;

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
        ];
    }

}
