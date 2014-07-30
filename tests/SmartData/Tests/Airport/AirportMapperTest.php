<?php
namespace SmartData\SmartData\Tests\Airport;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Airport\AirportMapper;

class AirportMapperTest extends PHPUnit_Framework_TestCase
{
    public function testCollectionMapper()
    {
        $collection = (new AirportMapper())->loadCollection();
        $this->assertGreaterThan(1, count($collection));
    }

    public function testEntityMapper()
    {
        $entity = (new AirportMapper())->loadCollection()->get(0);
        $this->assertInstanceOf('SmartData\\SmartData\\Airport\\AirportEntity', $entity);
        $this->assertNotEmpty($entity->getName());
    }
}
