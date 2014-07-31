<?php
namespace SmartData\SmartData\Geolocation;

use JsonSerializable;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Coordinate\CoordinateInterface;

class GeolocationEntity implements JsonSerializable, CoordinateInterface
{
    const SOURCE_IP = 'ip';
    const SOURCE_HTML5 = 'html5';
    const SOURCE_POSTAL_CODE = 'postal_code';

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
    private $accuracy;

    /**
     * @var string
     */
    private $source;

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
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'source' => $this->getSource(),
            'accuracy' => $this->getAccuracy()
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
