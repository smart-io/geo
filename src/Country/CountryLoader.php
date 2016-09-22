<?php

namespace Smart\Geo\Country;

use Smart\Geo\Storage;

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
            file_get_contents($this->getStorage() . DIRECTORY_SEPARATOR . self::ALL_COUNTRIES_FILE),
            true
        );
    }

    /**
     * @param string $country
     * @return array
     */
    public function loadCountry($country)
    {
        if (!$country) return null;
         $file = $this->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::COUNTRY_FILE, $country);
        if (!file_exists($file)) return null;

        return json_decode(
            file_get_contents($file),
            true
        );
    }

    /**
     * @param string $country
     * @return array
     */
    public function loadCountryPolygon($country)
    {
        if (!$country) return null;
        $file = $this->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::COUNTRY_POLYGON_FILE, $country);
        if (!file_exists($file)) return null;

        return json_decode(
            file_get_contents($file),
            true
        );
    }

    /**
     * @return string
     */
    private function getStorage()
    {
        if (null === $this->storage) {
            $this->storage = new Storage();
        }
        return $this->storage->getStorage();
    }
}
