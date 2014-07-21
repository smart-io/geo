<?php
namespace SmartData\SmartData\Airport;

class AirportMapper
{
    const JSON_FILE = 'airports/airports.json';

    /**
     * @return string
     * @todo replace this by the config class
     * @deprecated
     */
    public function getJsonFile()
    {
        return __DIR__ . "/../../../storage/" . self::JSON_FILE;
    }

    /**
     * @return AirportCollection
     */
    public function mapCollection()
    {
        $collection = new AirportCollection();
        $content = file_get_contents($this->getJsonFile());
        $objects = json_decode($content, true);
        foreach ($objects as $attributes) {
            $airport = $this->mapEntity($attributes);
            if (null !== $airport) {
                $collection->add($airport);
            }
        }
        return $collection;
    }

    /**
     * @param array $attributes
     * @return AirportEntity
     */
    public function mapEntity(array $attributes)
    {
        $airport = new AirportEntity();
        $airport->setName($attributes['name']);
        $airport->setCity($attributes['city']);
        $airport->setCountryName($attributes['countryName']);
        $airport->setCountryCode($attributes['countryCode']);
        $airport->setCode($attributes['code']);
        $airport->setCityCode($attributes['cityCode']);
        $airport->setLatitude($attributes['latitude']);
        $airport->setLongitude($attributes['longitude']);
        $airport->setAltitude($attributes['altitude']);
        $airport->setTimezone($attributes['timezone']);
        $airport->setDst($attributes['dst']);
        $airport->setIsCity($attributes['isCity']);
        $airport->setIsMajorAirport($attributes['isMajorAirport']);
        $airport->setPopularityTier($attributes['popularityTier']);
        return $airport;
    }
}
