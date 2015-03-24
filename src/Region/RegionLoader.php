<?php

namespace Smart\Geo\Region;

use Smart\Geo\Storage;

class RegionLoader
{
    const ALL_REGIONS_FILE = 'regions/regions.json';
    const REGION_FILE = 'regions/regions/%s.json';
    const REGION_POLYGON_FILE = 'regions/regions/%s/polygon.json';

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
    public function loadAllRegions()
    {
        return json_decode(
            file_get_contents($this->getStorage() . DIRECTORY_SEPARATOR . self::ALL_REGIONS_FILE),
            true
        );
    }

    /**
     * @param string $region
     * @return array
     */
    public function loadRegion($region)
    {
        return json_decode(
            file_get_contents(
                $this->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::REGION_FILE, $region)
            ),
            true
        );
    }

    /**
     * @param string $region
     * @return array
     */
    public function loadRegionPolygon($region)
    {
        return json_decode(
            file_get_contents(
                $this->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::REGION_POLYGON_FILE, $region)
            ),
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
