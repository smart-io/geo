<?php

namespace Smart\Geo\Tests\Region;

use PHPUnit_Framework_TestCase;
use Smart\Geo\Region\RegionEntity;
use Smart\Geo\Region\RegionRepository;
use Smart\Geo\Storage;

class RegionRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function getRepository()
    {
        return new RegionRepository(new Storage());
    }

    public function testFindAll()
    {
        $collection = $this->getRepository()->findAll();
        $this->assertGreaterThan(1, count($collection));
        $regionExample = $collection->get(0);
        $this->assertInstanceOf(RegionEntity::class, $regionExample);
        $this->assertEquals(2, strlen($regionExample->getCode()));
    }

    public function testFindByCode()
    {
        $region = $this->getRepository()->findByCode('BC');
        $this->assertInstanceOf(RegionEntity::class, $region);
        $this->assertEquals(2, strlen($region->getCode()));
    }
}
