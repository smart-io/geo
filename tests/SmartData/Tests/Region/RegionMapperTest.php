<?php
namespace SmartData\SmartData\Tests\Region;

use PHPUnit_Framework_TestCase;
use SmartData\SmartData\Region\RegionEntity;
use SmartData\SmartData\Region\RegionLoader;
use SmartData\SmartData\Region\RegionMapper;

class RegionMapperTest extends PHPUnit_Framework_TestCase
{
    public function testMapArrayToCollection()
    {
        $collection = (new RegionMapper())->mapArrayToCollection((new RegionLoader())->loadAllRegions());
        $this->assertGreaterThan(1, count($collection));
    }

    public function testMapArrayToEntity()
    {
        $regions = (new RegionLoader())->loadAllRegions();
        $entity = (new RegionMapper())->mapArrayToEntity($regions[0]);
        $this->assertInstanceOf(RegionEntity::class, $entity);
        $this->assertNotEmpty($entity->getCode());
    }
}
