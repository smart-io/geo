<?php

namespace Smart\Geo\Tests\Country;

use PHPUnit_Framework_TestCase;
use Smart\Geo\Country\CountryRepository;
use Smart\Geo\Storage;

class CountryCollectionTest extends PHPUnit_Framework_TestCase
{
    public function getCollection()
    {
        return (new CountryRepository)->findAll();
    }

    public function testOrderByCountryName()
    {
        $collection = $this->getCollection();
        $collection->orderByName('en');
        $this->assertGreaterThan(1, $collection->count());
        $previousName = null;
        foreach ($collection as $country) {
            $name = $country->getNames()->get('en')->getName();
            $result = strcasecmp($name, $previousName);
            $this->assertGreaterThan(0, $result);
            $previousName = $name;
        }
    }
}
