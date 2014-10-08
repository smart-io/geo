<?php
namespace SmartData\SmartData\Country;

use SmartData\SmartData\Country\CountryName\CountryNameEntity;
use SmartData\SmartData\Language\LanguageMapper;
use SmartData\SmartData\Storage;
use SmartData\SmartData\Language\LanguageCollection;

class CountryMapper
{
    const JSON_FILE = '/countries/countries.json';

    /**
     * @var LanguageCollection
     */
    private $languageCollection;

    public function __construct()
    {
        $this->languageCollection = (new LanguageMapper())->mapCollection();
    }

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
     * @return CountryCollection
     */
    public function mapJsonCollection(array $data)
    {
        $collection = new CountryCollection();
        foreach ($data as $attributes) {
            $country = $this->mapJsonEntity($attributes);
            if (null !== $country) {
                $collection->add($country);
            }
        }
        return $collection;
    }

    /**
     * @param array $attributes
     * @return CountryEntity
     */
    public function mapJsonEntity(array $attributes)
    {
        $country = new CountryEntity();
        $country->setCode($attributes['code']);
        $country->setShortCode($attributes['shortCode']);
        $country->setLatitude($attributes['latitude']);
        $country->setLongitude($attributes['longitude']);
        $country->setBoundariesNortheastLatitude($attributes['boundariesNortheastLatitude']);
        $country->setBoundariesNortheastLongitude($attributes['boundariesNortheastLongitude']);
        $country->setBoundariesSouthwestLatitude($attributes['boundariesSouthwestLatitude']);
        $country->setBoundariesSouthwestLongitude($attributes['boundariesSouthwestLongitude']);

        foreach ($attributes['names'] as $language => $name) {
            $countryName = new CountryNameEntity();
            $countryName->setLanguage($this->languageCollection->get($language));
            $countryName->setName($name);
            $country->getNames()->add($countryName);
        }

        return $country;
    }
}
