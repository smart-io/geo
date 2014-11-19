<?php
namespace SmartData\SmartData\Geolocation;

use MaxMind\Db\Reader;
use SmartData\SmartData\Ip\IpEntity;
use SmartData\SmartData\Storage;

class GeolocationRepository
{
    const GEOLITE2_DATABASE = '/geolite2/GeoLite2-City.mmdb';

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var Reader
     */
    private $reader;

    /**
     * @param Storage $storage
     * @param Reader $reader
     */
    public function __construct(Storage $storage = null, Reader $reader = null)
    {
        if (null !== $storage) {
            $this->storage = $storage;
        }
        if (null !== $reader) {
            $this->reader = $reader;
        }
    }

    /**
     * @param IpEntity $ip
     * @return null|GeolocationEntity
     */
    public function findByIp(IpEntity $ip)
    {
        $reader = $this->getReader();
        $result = $reader->get($ip->getIp());
        $reader->close();

        if (is_array($result)) {
            return (new GeolocationMapper())->mapGeoIp($result);
        }

        return null;
    }

    /**
     * @return Reader
     */
    private function getReader()
    {
        if (null === $this->reader) {
            $this->reader = new Reader($this->getStorage()->getStorage() . self::GEOLITE2_DATABASE);
        }
        return $this->reader;
    }

    /**
     * @return Storage
     */
    private function getStorage()
    {
        if (null === $this->storage) {
            $this->storage = new Storage();
        }
        return $this->storage;
    }
}
