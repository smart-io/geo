<?php
namespace SmartData\SmartData\Geolocation;

use MaxMind\Db\Reader;
use SmartData\SmartData\Ip\IpEntity;
use SmartData\SmartData\Storage;

class GeolocationRepository
{
    const GEOLITE2_DATABASE = '/geolite2/GeoLite2-City.mmdb';

    /**
     * @param IpEntity $ip
     * @return null|GeolocationEntity
     */
    public function findByIp(IpEntity $ip)
    {
        $storage = new Storage();
        $reader = new Reader($storage->getStorage() . self::GEOLITE2_DATABASE);
        $result = $reader->get($ip->getIp());
        $reader->close();

        if (is_array($result)) {
            return (new GeolocationMapper())->mapGeoIp($result);
        }

        return null;
    }
}
