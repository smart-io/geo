<?php
namespace SmartData\SmartData\Country;

use SmartData\SmartData\Storage;

class CountryRepository
{
    const COUNTRIES_FILES = 'countries/countries/%s.json';

    /**
     * @var CountryCollection
     */
    private $container;

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var CountryMapper
     */
    private $mapper;

    /**
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
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

    /**
     * @return CountryCollection
     */
    public function findAll()
    {
        if (null === $this->container) {
            $this->container = $this->getMapper()->loadCollection();
        }
        return $this->container;
    }

    /**
     * @param string $shortCode
     * @return null|CountryEntity
     */
    public function findByShortCode($shortCode)
    {
        $file = $this->storage->getStorage() . DIRECTORY_SEPARATOR . sprintf(self::COUNTRIES_FILES, $shortCode);
        if (is_file($file)) {
            $data = json_decode(file_get_contents($file), true);
            return (new CountryMapper)->mapJsonEntity($data);
        }
        return null;
    }
}
