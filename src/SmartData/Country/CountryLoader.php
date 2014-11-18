<?php
namespace SmartData\SmartData\Country;

use SmartData\SmartData\Storage;

class CountryLoader
{
    const ALL_COUNTRIES_FILE = 'countries/countries.json';
    const COUNTRY_FILE = 'countries/countries/%s.json';
    const COUNTRY_POLYGON_FILE = 'countries/countries/%s/polygon.json';

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @param Storage $storage
     */
    public function __construct(Storage $storage = null)
    {
        if (null === $storage) {
            $this->storage = new Storage();
        }
    }

    /**
     * @return array
     */
    public function loadAllCountries()
    {
        return json_decode(
            file_get_contents($this->storage->getStorage() . DIRECTORY_SEPARATOR . self::ALL_COUNTRIES_FILE),
            true
        );
    }

    /**
     * @param string $country
     * @return array
     */
    public function loadCountry($country)
    {
        return json_decode(
            file_get_contents(
                $this->storage->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::COUNTRY_FILE, $country)
            ),
            true
        );
    }

    /**
     * @param string $country
     * @return array
     */
    public function loadCountryPolygon($country)
    {
        return json_decode(
            file_get_contents(
                $this->storage->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::COUNTRY_POLYGON_FILE, $country)
            ),
            true
        );
    }
}
