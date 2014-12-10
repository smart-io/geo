<?php
namespace SmartData\SmartData;

use SmartData\SmartData\Airport\AirportRepository;
use SmartData\SmartData\Country\CountryRepository;
use SmartData\SmartData\Geolocation\GeolocationRepository;
use SmartData\SmartData\Ip\IpRepository;
use SmartData\SmartData\Region\RegionRepository;

class SmartData
{
    /**
     * @var Storage
     */
    private static $storage;

    /**
     * @var GeolocationRepository
     */
    private static $geolocationRepository;

    /**
     * @var IpRepository
     */
    private static $ipRepository;

    /**
     * @var CountryRepository
     */
    private static $countryRepository;

    /**
     * @var RegionRepository
     */
    private static $regionRepository;

    /**
     * @return GeolocationRepository
     */
    public function getGeolocationRepository()
    {
        if (null === self::$geolocationRepository) {
            self::$geolocationRepository = new GeolocationRepository();
        }
        return self::$geolocationRepository;
    }

    /**
     * @return IpRepository
     */
    public static function getIpRepository()
    {
        if (null === self::$ipRepository) {
            self::$ipRepository = new IpRepository();
        }
        return self::$ipRepository;
    }

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
