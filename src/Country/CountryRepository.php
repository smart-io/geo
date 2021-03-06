<?php

namespace Smart\Geo\Country;

use Smart\Geo\Storage;

class CountryRepository
{
    /**
     * @var CountryCollection
     */
    private $collection;

    /**
     * @var CountryEntity[]
     */
    private $items = [];

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var CountryMapper
     */
    private $mapper;

    /**
     * @var CountryLoader
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
     * @return CountryCollection
     */
    public function findAll()
    {
        if (null === $this->collection) {
            $this->collection = $this->getMapper()->mapArrayToCollection($this->getLoader()->loadAllCountries());
        }
        return $this->collection;
    }

    /**
     * @param string $shortCode
     * @return null|CountryEntity
     */
    public function findByShortCode($shortCode)
    {
        if (!isset($this->items[$shortCode])) {
            $country = $this->getLoader()->loadCountry($shortCode);
            if (!$country) return null;
            return $this->items[$shortCode] = $this->getMapper()->mapArrayToEntity($country);
        }
        return $this->items[$shortCode];
    }

    /**
     * @return CountryLoader
     */
    private function getLoader()
    {
        if (null === $this->loader) {
            $this->loader = new CountryLoader($this->storage);
        }
        return $this->loader;
    }

    /**
     * @return CountryMapper
     */
    private function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = new CountryMapper();
        }
        return $this->mapper;
    }
}
