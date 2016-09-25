<?php

namespace Smart\Geo;

use Smart\Geo\Country\CountryRepository;
use Smart\Geo\Region\RegionRepository;

class Geo
{
    /**
     * @var Storage
     */
    private static $storage;

    /**
     * @var CountryRepository
     */
    private static $countryRepository;

    /**
     * @var RegionRepository
     */
    private static $regionRepository;

    /**
     * @return CountryRepository
     */
    public static function getCountryRepository()
    {
        if (null === self::$countryRepository) {
            self::$countryRepository = new CountryRepository(self::getStorage());
        }
        return self::$countryRepository;
    }

    /**
     * @return RegionRepository
     */
    public static function getRegionRepository()
    {
        if (null === self::$regionRepository) {
            self::$regionRepository = new RegionRepository(self::getStorage());
        }
        return self::$regionRepository;
    }

    /**
     * @param Storage $storage
     */
    public static function setStorage($storage)
    {
        self::$storage = $storage;
    }

    /**
     * @return Storage
     */
    public static function getStorage()
    {
        if (null === self::$storage) {
            self::$storage = new Storage();
        }
        return self::$storage;
    }
}
