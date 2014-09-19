<?php
namespace SmartData\SmartData\Tests\Country;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Country\CountryMapper;

class CountryMapperTest extends PHPUnit_Framework_TestCase
{
    public function testCollectionMapper()
    {
        $collection = (new CountryMapper())->loadCollection();
        $this->assertGreaterThan(1, count($collection));
    }

    public function testEntityMapper()
    {
        $entity = (new CountryMapper())->loadCollection()->get(0);
        $this->assertInstanceOf('SmartData\\SmartData\\Country\\CountryEntity', $entity);
        $this->assertNotEmpty($entity->getCode());
    }
}
