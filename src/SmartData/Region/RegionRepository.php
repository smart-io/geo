<?php
namespace SmartData\SmartData\Region;

use SmartData\SmartData\Storage;

class RegionRepository
{
    /**
     * @var RegionCollection
     */
    private $collection;

    /**
     * @var RegionEntity[]
     */
    private $items = [];

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var RegionMapper
     */
    private $mapper;

    /**
     * @var RegionLoader
     */
    private $loader;

    /**
     * @param Storage $storage
     */
    public function __construct(Storage $storage = null)
    {
        $this->storage = $storage;
    }

    /**
     * @return RegionCollection
     */
    public function findAll()
    {
        if (null === $this->collection) {
            $this->collection = $this->getMapper()->mapArrayToCollection($this->getLoader()->loadAllRegions());
        }
        return $this->collection;
    }

    /**
     * @param string $code
     * @return null|RegionEntity
     */
    public function findByCode($code)
    {
        if (!isset($this->items[$code])) {
            return $this->items[$code] =
                $this->getMapper()->mapArrayToEntity($this->getLoader()->loadRegion($code));
        }
        return $this->items[$code];
    }

    /**
     * @return RegionLoader
     */
    private function getLoader()
    {
        if (null === $this->loader) {
            $this->loader = new RegionLoader($this->storage);
        }
        return $this->loader;
    }

    /**
     * @return RegionMapper
     */
    private function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = new RegionMapper();
        }
        return $this->mapper;
    }
}
