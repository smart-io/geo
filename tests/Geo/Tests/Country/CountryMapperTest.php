<?php

namespace Smart\Geo\Tests\Country;

use PHPUnit_Framework_TestCase;
use Smart\Geo\Country\CountryEntity;
use Smart\Geo\Country\CountryLoader;
use Smart\Geo\Country\CountryMapper;

class CountryMapperTest extends PHPUnit_Framework_TestCase
{
    public function testMapArrayToCollection()
    {
        $collection = (new CountryMapper())->mapArrayToCollection((new CountryLoader())->loadAllCountries());
        $this->assertGreaterThan(1, count($collection));
    }

    public function testMapArrayToEntity()
    {
        $countries = (new CountryLoader())->loadAllCountries();
        $entity = (new CountryMapper())->mapArrayToEntity($countries[0]);
        $this->assertInstanceOf(CountryEntity::class, $entity);
        $this->assertNotEmpty($entity->getCode());
    }
}
