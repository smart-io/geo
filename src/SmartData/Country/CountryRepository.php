<?php
namespace SmartData\SmartData\Country;

use SmartData\SmartData\Storage;

class CountryRepository
{
    const COUNTRIES_FILES = 'countries/countries/%s.json';

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
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
