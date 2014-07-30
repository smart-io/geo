<?php
namespace SmartData\SmartData\Airport;

use SmartData\SmartData\Storage;

class AirportMapper
{
    const JSON_FILE = '/airports/airports.json';

    /**
     * @return string
     */
    public function getJsonFile()
    {
        return (new Storage())->getStorage() . self::JSON_FILE;
    }

    public function loadCollection()
    {
        $data = json_decode(file_get_contents($this->getJsonFile()), true);
        return $this->mapJsonCollection($data);
    }

    /**
     * @param array $data
     * @return AirportCollection
     */
    public function mapJsonCollection(array $data)
    {
        $collection = new AirportCollection();
        foreach ($data as $attributes) {
            $airport = $this->mapJsonEntity($attributes);
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
    public function mapJsonEntity(array $attributes)
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
